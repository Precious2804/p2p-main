<?php

namespace App\Http\Controllers;

use App\Models\AllAmountProvidavle;
use App\Models\AllGetRequest;
use App\Models\AllProvidedHelp;
use App\Models\AllTickets;
use App\Models\ChatReply;
use App\Models\ChatSupport;
use App\Models\CompletedProvide;
use App\Models\ContactUs;
use App\Models\MergeHelp;
use App\Models\PaymentProof;
use App\Models\ProcessGet;
use App\Models\ProvideHelp;
use App\Models\ReferralTable;
use App\Models\RunningInvestment;
use App\Models\SettingTable;
use App\Models\Testimonials;
use App\Models\User;
use App\Models\UserTotalHelp;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PHPUnit\Util\Json;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Intervention\Image\Facades\Image;

class MainController extends Controller
{
    // returns the welcome view
    public function welcome(){
        return view('welcome');
    }

    //returns the about view
    public function about(){
        return view('about');
    }
    //returns the blog view
    public function blog(){
        return view('blog');
    }

    //returns the contact view
    public function contact(){
        return view('contact');
    }

    //contact us method
    public function doContact(Request $req){
        $result = ContactUs::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'message'=>$req->message
        ]);

        if($result){
            return back()->with('success', "Thanks for reachhing out to us, we would get back to you shortly");
        } else{
            return back()->with('fail', "Sorry!!! your message was not delivered successfully");
        }
    }

    //returns the login view
    public function login(){
        return view ('login');
    }

    //checks the users inputs and perform sign in
    public function doLogin(Request $req){
        $user = User::where('email', $req->email)->first();
         if(User::Where('email', $req->email)->exists() == true){

             $credentials = ['email' => $req->email, 'password' => $req->password];
             if(Auth::validate($credentials) == true) {
                 Auth::attempt($credentials, $req->remember_me == 'on' ? true : false);
                 
                 if($user['isAdmin'] == 1){
                     return redirect()->to(route('admin/dashboard'));
                 }
                 else{
                    return redirect()->to(route('dashboard'));
                 }
             } else {
                 return redirect()->back()->with('info', 'invalid username or Password, please check your credentials and try again.')->withInput($req->only('loginEmail'));
             }

         } else{
             return redirect()->back()->with('info', 'invalid username or Password, please check your credentials and try again.')->withInput($req->only('loginEmail'));
         }

    }

    // returns the landing page
    public function landing(){
        $data = ['loggedUserInfo'=>User::where('id', auth()->user()->id)->first()];
        return view('landing', $data);
    }

    //returns the registeration view
    public function register(Request $req){
        $ref_id = ['ref_id'=>$req->ref_id];
        return view ('register', $ref_id);
    }

    //checks the users inputs and perform registration
    public function doRegister(Request $req){
        //validating inputs
        $req->validate([
            'fname'=>'required|string',
            'lname' => 'string',
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'phone'=> 'required|string|max:11',
            'password' => 'required|min:6|confirmed',
            ]);
        $result = User::create([
            'fname'=>$req->fname,
            'lname'=>$req->lname,
            'username'=>$req->username,
            'email'=>$req->email,
            'phone'=>$req->phone,
            'gender'=>$req->gender,
            'ref_id' =>$req->ref_id ?? $req->ref_id,
            'password'=>Hash::make($req->password)
        ]);
        ProvideHelp::create([
            'email' => $req->email
        ]);
        UserTotalHelp::create([
            'email' => $req->email
        ]);
        ReferralTable::create([
            'reffered_by' => $req->ref_id,
            'user_id'=>$req->username
        ]);

        //increment number of referrals for every time a user's referral code is used
        $userRef = User::where('ref_id', $req->ref_id)->first();
            $noofRef = $userRef->count('ref_id');
            $findRef = ReferralTable::where('reffered_by', '=', $req->ref_id);
                $findRef->update([
                    'commision'=> $noofRef
                ]);

            if($result){
                return redirect()->to('login')->with('success', 'Registration was Succefull');
            } else {
                return back()->with('fail', "Registration Failed");
            }

    }

    //logout method
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    //Return dashboard view method
    public function dashboard(){
        $data = User::where('id', '=', auth()->user()->id)->first();
        $helpInfo = ProvideHelp::where('email', '=', auth()->user()->email)->first();
        $investDetail = UserTotalHelp::where('id', '=', auth()->user()->id)->first();
        $allProvide = RunningInvestment::query()->where('email', auth()->user()->email)->get();
        $refInfo = ReferralTable::where('id', auth()->user()->id)->first();
        return view('dashboard', compact('helpInfo', 'data', 'investDetail', 'allProvide', 'data', 'refInfo' ));

    }

    //Return Account View
    public function account(Request $req){
        $data = ['loggedUserInfo'=>User::where('id', '=', auth()->user()->id)->first()];
        $invest = ['investDetail'=>UserTotalHelp::where('id', '=', auth()->user()->id)->first()];
        $refInfo = ['refInfo'=>ReferralTable::where('id', '=', auth()->user()->id)->first()];
        return view('account', $data)->with($invest)->with($refInfo);
    }

    // update account method
    public function updateAccount(Request $req){
        //find logged in user
        $edit = User::find(auth()->user()->id);

        $result = $edit->update([
            'fname'=>$req->fname,
            'lname'=>$req->lname,
            'phone'=>$req->phone,
        ]);
        if($result){
            return back()->with('successUpdate', 'Updated Profile Successfully');
        } else {
            return back()->with('failUpdate', "Unable to Update Profile");
        }
    }

    // update bank details method
    public function bankUpdate(Request $req){
        //find logged in user
        $detail = User::find(auth()->user()->id);

        $req->validate([
            'acct_name' => 'required|string',
            'acct_number' => 'required|string|unique:users',
            'acct_type' => 'string',
            'bank' => 'required|string'
        ]);
        $result = $detail->update([
            'acct_name'=>$req->acct_name,
            'acct_number'=>$req->acct_number,
            'acct_type'=>$req->acct_type,
            'bank'=>$req->bank
        ]);
        if($result){
            return back()->with('successBank', 'Bank Details has been Updated Successfully');
        } else {
            return back()->with('failBank', "Unable to Update Bank Details");
        }
    }

    // update picture method
    public function updatePicture(Request $req)
    {
        //find logged in user
        $data = User::find(auth()->user()->id);

        $req->validate([
            'image' => 'required|mimes:png,jpg,jpeg,gif,svg|max:2048'
            ]);

            $file = $req->file('image');
            $name = sha1(date('YmdHis') . Str::random(20));
            $resize_name = $name . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/site/' . $resize_name;
            Image::make($file)->resize(function ($constraints) {
                $constraints->aspectRatio();
            })->save($path);
            $data->image = $resize_name;
            $data->save();
            return back()->with('successPic','Profile Picture Uploaded Successfully');

    }

    // returns provide help view
    public function provideHelp(Request $req){
        $data = ['loggedUserInfo'=>User::where('id', '=', auth()->user()->id)->first()];
        $help = ['helpInfo'=>ProvideHelp::where('email', '=', auth()->user()->email)->first()];
        $invest = ['investDetail'=>UserTotalHelp::where('email', '=', auth()->user()->email)->first()];
        $refInfo = ['refInfo'=>ReferralTable::where('id', '=', auth()->user()->id)->first()];
        $amountPayable = ['amountPayable'=>AllAmountProvidavle::all()];
        $rate = ['rate'=>SettingTable::where('id', '=', 1)->first()->rate];

        return view('ph', $data, $help)->with($invest)
                                        ->with($refInfo)
                                        ->with($amountPayable)
                                        ->with($rate);
    }

    // processing amount method
    public function processAmount(Request $req){
        $genSet = SettingTable::where('id', '=', 1)->first();
        $chargeRate = $genSet->rate;
        $rate = $chargeRate / 100;

        $data = ProvideHelp::where('email', auth()->user()->email);

        $req->validate([
            'amount' =>  'required',
        ]);
        //calculate the 50% for every amount investted
        $profit = $req->amount * $rate;
        $total = $profit + $req->amount;

        $result = $data->update([
            'amount' => $req->amount,
            'rate' =>$chargeRate,
            'profit' => $profit,
            'total' =>$total
        ]);
        if($result){
            return back()->with('success', "Succesfully Updated");
        } else {
            return back()->with('fail', "Failed");
        }
    }

    //generating a unique transaction ID for every transaction placed on the system
    private function generateId(){
        $unique_id = (string) Str::uuid();
        $exploded = explode('-', $unique_id);
        $n_unique_id = $exploded[4];
        return $n_unique_id;
    }


    private function getUniqueId(){
        $id = $this->generateId();

        if (AllProvidedHelp::find($id)) {
            $this->getUniqueId();
        }else{
            return $id;
        }
    }

        // processing the do provide method
    public function doProvide(Request $req){
        //find the logged in user
        $data = UserTotalHelp::where('email', auth()->user()->email);
        //search for the user's email in the all provided help table
        $getProvideTable = AllProvidedHelp::query()->where('email', '=', auth()->user()->email)->get();

        //calculating a particular user's sum for all the investment done on the system
        $totalAmount = $getProvideTable->sum('amount');
        $totalProfit = $getProvideTable->sum('profit');
        $sumTotal = $getProvideTable->sum('total');
        $investmentCount = $getProvideTable->count('id');
        $noOfInvestments = $investmentCount + 1;


        $data->update([
            'totalAmount' => $totalAmount,
            'totalProfit' => $totalProfit,
            'sumTotal' => $sumTotal,
            'noOfInvestments' => $noOfInvestments
        ]);

        $unique_id = $this->getUniqueId();
        $genSet = SettingTable::where('id', '=', 1)->first();
        $chargeRate = $genSet->rate;

        $result = AllProvidedHelp::create([
            'id'=>$unique_id,
            'email' => $req->email,
            'amount' =>$req->amount,
            'rate' => $chargeRate,
            'profit' =>$req->profit,
            'total' =>$req->total,
            'status'=>"Awaiting Merge"
        ]);
        if($result){
            return back()->with('helpSuccess', "Congratulations on your Investment!");
        } else{
            return back()->with('helpFail', "Transaction was not completed");
        }

    }
    public function track(){
        $data = ['loggedUserInfo'=>User::where('id', '=', auth()->user()->id)->first()];
        $getProvide = ['allProvide'=>AllProvidedHelp::query()->where('email', auth()->user()->email)->get()];
        $getGet = ['allGet'=>AllGetRequest::query()->where('email', auth()->user()->email)->get()];
        return view('track',$data)
                            ->with($getProvide)
                            ->with($getGet);
    }
    public function pay(Request $req){
        $findID = ['findMerge'=>MergeHelp::where('id', '=', $req->id)->first()];
        $data = ['loggedUserInfo'=>User::where('id', '=', auth()->user()->id)->first()];
        $getProvide = ['allProvide'=>AllProvidedHelp::query()->where('email',  auth()->user()->email)->get()];
        $getIDPay = ['payID'=>AllProvidedHelp::query()->where('id',  $req->id)->first()];
        return view('pay', $data)
                            ->with($getProvide)
                            ->with($findID)
                            ->with($getIDPay);
    }
    public function doPay(Request $req){
        $findID = ['findID'=>MergeHelp::where('id', 'LIKE', $req->id)->get()];

        if ($findID){
            return back()->with('successPay', "Payment was Successfull");
        } else {
            return back()->with('failPay', "No Payment");
        }
    }
    public function uploadProof(Request $req){

        $req->validate([
            'id'=>'unique:payment_proofs',
            'email' => 'required',
            'pay_method' => 'required',
            'dep_name' => 'required',
            'paid_date' => 'required',
            'proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($req->file()) {
            $name = time().'_'.$req->proof->getClientOriginalName();
            $filePath = $req->file('proof')->storeAs('proofs', $name, 'public');
        }
        $result = PaymentProof::create([
            'id'=>$req->id,
            'get_help_id'=>$req->get_help_id,
            'email' =>$req->email,
            'pay_method' =>$req->pay_method,
            'dep_name' =>$req->dep_name,
            'paid_date' =>$req->paid_date,
            'amount'=>$req->amount,
            'profit'=>$req->profit,
            'rate'=>$req->rate,
            'total'=>$req->total,
            'proof' =>$req->proof = '/storage/' . $filePath
        ]);

        if($result){
            $createComplete = CompletedProvide::create([
                'id'=>$req->id,
                'get_help_id'=>$req->get_help_id,
                'email'=>$req->email,
                'amount'=>$req->amount,
                'profit'=>$req->profit,
                'rate'=>$req->rate,
                'total'=>$req->total
            ]);
            if($createComplete){
                //calculating the due time for a transaction that was started
                $dateTime = $createComplete->created_at;
                $exp = explode(' ', $dateTime);
                $exp2 = explode(':', $exp[1]);
                $hour = $exp2[0];
                $minute = $exp2[1];
                $second = $exp2[2];

                $convertHour = $hour * 60 * 60;
                $convertMinute = $minute * 60;

                //estimated due time in seconds
                $dueTime = 7 * ($convertHour + $convertMinute + $second);

                //creating a table to hold all the completed helps transactions
                $createComplete->update([
                    'due_time' => $dueTime
                ]);
            }

            return redirect('track')->with('proofUpload', "Proof of Payment has been Uploaded, Wait for Confirmation from Getter. Thanks");
        } else{
            return back()->with('proofFail', "Failed to Upload Proof of Payment");
        }
    }

    public function receive(Request $req){
        $findGetID = ['findGet'=>AllGetRequest::where('id', '=', $req->id)->first()];
        $data = ['loggedUserInfo'=>User::where('id', '=', auth()->user()->id)->first()];
        $checkPaid = ['paid'=>PaymentProof::where('get_help_id', $req->id)->first()];
        return view('receive', $findGetID)
                                        ->with($data)
                                        ->with($checkPaid);
    }

    public function confirmPay(Request $req){
        $result = RunningInvestment::create([
            'id'=>$req->id,
            'email'=>$req->email,
            'amount'=>$req->amount,
            'rate'=>$req->rate,
            'profit'=>$req->profit,
            'total'=>$req->total,
            'due_date'=>Carbon::now()->addDays(14)
        ]);
        if($result){
            AllProvidedHelp::find($req->id)->delete();
            CompletedProvide::find($req->id)->delete();
            AllGetRequest::where('get_help_id',  $req->get_help_id)->delete();
            PaymentProof::where('get_help_id', $req->get_help_id)->delete();

            return redirect('track')->with('successConfirm', "Congratulations on Sucessfully receiving payment");
        } else {
            return back()->with('fail', "Operation Failed");
        }
    }

    // returns get help view
    public function getHelp(Request $req){
        $data = ['loggedUserInfo'=>User::where('id', '=', auth()->user()->id)->first()];
        $invest = ['investDetail'=>UserTotalHelp::where('id', '=', auth()->user()->id)->first()];
        $refInfo = ['refInfo'=>ReferralTable::where('id', '=', auth()->user()->id)->first()];
        $getInfo = ['getInfo'=>RunningInvestment::where('email', '=', auth()->user()->email)->get()];
        // $getSpecific = ['getSpecific'=>RunningInvestment::where('id', $req->get_help_id)->first()];
        $dataSession = ['getSpecific'=>session('dataSession')];
        $rate = ['rate'=>SettingTable::where('id', '=', 1)->first()->rate];
        return view('gh', $data)->with($invest)
                                ->with($getInfo)
                                ->with($refInfo)
                                ->with($rate)
                                ->with($dataSession);
    }
    public function doGet(Request $req){
        $req->validate([
            'get_help_id'=>'required'
        ]);
        // ProcessGet::create([
        //     'email' =>$req->email,
        //     'get_help_id'=>$req->get_help_id
        // ]);
            $data = RunningInvestment::where('id', $req->get_help_id)->first();
            session()->put('dataSession', $data);
            $data2 = RunningInvestment::where('email', $req->email)->get();
            $beforeGet = SettingTable::where('id', '=', 1)->first()->beforeGet;

            // check the number of times that the user has provided help on the system
            $data2Count = $data2->count('email');
            $due_date = $data['due_date'];

            if ($data2Count < $beforeGet) {
                return back()->with('failedGet', "You must have at least Two(2) Investments Running on the Platform before Withdrawal can be granted");
            }
            elseif(Carbon::now() < $due_date) {
                return back()->with('not_due', "Your Investment has to be up to 14days, before, you are Eligible to Withdraw");
            }
            elseif($data){
                return back()->with('successGet', $data);
            }
            else{
                return back()->with('failed', "Un-recognized Transaction ID");
            }

    }
    public function withdraw(Request $req){
            $result = AllGetRequest::create([
                'get_help_id'=>$req->get_help_id,
                'email'=>$req->email,
                'amount'=>$req->amount,
                'acct_name'=>$req->acct_name,
                'acct_number'=>$req->acct_number,
                'bank'=>$req->bank,
                'phone'=>$req->phone
            ]);
            if ($result){
            // removes any already gotten help from the all provided helps table
            RunningInvestment::where('id', $req->get_help_id)->first()->delete();

           return back()->with('successWithdraw', "Withdrawal Request was Successful");
        } else{
            return back()->with('failWithdraw', "Withdrawal was not Succesfull");
        }
    }
    // returns referral view
    public function referral(){
        $data = ['loggedUserInfo'=>User::where('id', auth()->user()->id)->first()];
        $refInfo = ['refInfo'=>ReferralTable::where('id', '=', auth()->user()->id)->get()];
        return view('referral', $data)->with($refInfo);

    }


    public function support(){
        $data = ['loggedUserInfo'=>User::where('id', '=', auth()->user()->id)->first()];
        $tickets = ['tickets'=>AllTickets::where('email', 'LIKE', auth()->user()->email)->get()];
        return view('support', $data)->with($tickets);
    }

    private function getUniqueIdTickets(){
        $id = $this->generateId();

        if (AllTickets::find($id)) {
            $this->getUniqueIdTickets();
        }else{
            return $id;
        }
    }

    public function chatSupport(Request $req){
        $req->validate([
            'ticket_type'=>'required',
            'subject'=>'max:255',
            'message'=>'required|max:1000',
            'attach' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048'
        ]);

        if($req->file()) {
            $name = time().'_'.$req->attach->getClientOriginalName();
            $filePath = $req->file('attach')->storeAs('chatAttachments', $name, 'public');
        } else{
            $filePath = "No Attachment";
        }

        $unique_id = $this->getUniqueIdTickets();
        $result = ChatSupport::create([
            'unique_id'=>$unique_id,
            'email'=>$req->email,
            'ticket_type'=>$req->ticket_type,
            'subject'=>$req->subject,
            'message'=>$req->message,
            'attach' =>$req->attach = '/storage/' . $filePath
        ]);

        if($result){
                AllTickets::create([
                    'id'=>$unique_id,
                    'email'=>$req->email,
                    'ticket_type'=>$req->ticket_type,
                ]);

            return back()->with('success', "Your Message was Delivered Successfully");
        } else {
            return back()->with('fail', "Unable to Send Message");
        }
    }

    public function chat(Request $req){
        $data = ['loggedUserInfo'=>User::where('id', '=', auth()->user()->id)->first()];
        $chatData = ['chatData'=>ChatSupport::where('unique_id', $req->id)->first()];
        $allMessages = ['allMessages'=>ChatSupport::where('unique_id', $req->id)->get()];
        $tickets = ['tickets'=>AllTickets::where('email', auth()->user()->email)->get()];
        return view('chat', $data)
                                ->with($chatData)
                                ->with($tickets)
                                ->with($allMessages);
    }
    public function newMessage(Request $req){

        $req->validate([
            'message'=>'required|max:1000',
            'attach' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048'
        ]);

        if($req->file()) {
            $name = time().'_'.$req->attach->getClientOriginalName();
            $filePath = $req->file('attach')->storeAs('chatAttachments', $name, 'public');
        } else{
            $filePath = "No Attachment";
        }

        $result = ChatSupport::create([
            'email'=>$req->email,
            'ticket_type'=>$req->ticket_type,
            'unique_id'=>$req->unique_id,
            'message'=>$req->message,
            'attach' =>$req->attach = '/storage/' . $filePath
        ]);
        if($result){
        return back()->with('success', "Your Message was Delivered Successfully");
    } else {
        return back()->with('fail', "Unable to Send Message");
    }
    }

    public function adminDashboard(){
        $allUsers = User::all();
        $allCompletedProv = RunningInvestment::all();
        $allRef = ReferralTable::all();
        $noOfUsers =['noOfUsers'=> count($allUsers)];
        $noOfCompleted =['noOfCompleted'=> count($allCompletedProv)];
        $noOfRef =['noOfRef'=> ($allRef->sum('commision'))];
        $allMessages = ['allMessages'=>ChatSupport::all()];
        $allTickets = ['allTickets'=>AllTickets::all()];
        $noOfTickets = ['noOfTickets'=> count($allTickets)-1];
        return view('admin.dashboard', $noOfUsers)
                                                  ->with($noOfCompleted)
                                                  ->with($noOfRef)
                                                  ->with($allTickets)
                                                  ->with($allMessages)
                                                  ->with($noOfTickets);
    }

    public function CreateUser(){
        return view('admin.create_user');
    }

    public function doCreateUser(Request $req){

       $created = $this->doRegister($req);

       if($created){
           return back()->with('success', "New User Has Been Created Successfully");
       } else{
           return back()->with('fail', "Unable to Create a New User");
       }
    }

    public function ManageUsers(){
        $data = ['allUsers'=>User::all()];
        return view('admin.manage_users', $data);
    }

    public function deleteUser($id){
        $result = User::find($id)->delete();
        if($result){
            return back()->with('deleted', "User has been Removed Succesfully!!!");
        } else {
            return back()->with('notdeleted', "Operation Failed");
        }
    }

    public function AllHelps(){
        $data = ['allHelps'=>AllProvidedHelp::all()];
        return view('admin.all_helps', $data);
    }
    public function deleteHelp($id){
        $result = AllProvidedHelp::find($id)->delete();
        if($result){
            return back()->with('deleted', "Delete was Succesfully!!!");
        } else {
            return back()->with('notdeleted', "Operation Failed");
        }
    }
    public function AllGetsTable(){
        $data = ['allGets'=>AllGetRequest::all()];
        return view('admin.all_gets_table', $data);
    }
    public function MergeHelp($id){
        $data = ['reqDetails'=>AllGetRequest::find($id)];
        $allProvId = ['allProvId'=>AllProvidedHelp::all()];
        return view('admin.merge_help', $data)->with($allProvId);
    }
    public function deleteGet($id){
        $result = AllGetRequest::find($id)->delete();
        if($result){
            return back()->with('deleted', "Delete was Succesfully!!!");
        } else {
            return back()->with('notdeleted', "Operation Failed");
        }
    }
    public function doMerge(Request $req){
        $req->validate([
            'id'=>'required',
            'get_help_id'=>'required'
        ]);
        $result = MergeHelp::create([
            'id'=>$req->id,
            'get_help_id'=>$req->get_help_id,
            'amount'=>$req->amount,
            'acct_name'=>$req->acct_name,
            'acct_number'=>$req->acct_number,
            'bank'=>$req->bank,
            'phone'=>$req->phone
        ]);
        if($result){
            return redirect('admin/all_gets_table')->with('merged', "The Merging Process was Successful");
        } else {
            return back()->with('notmerged', "Operation Failed");
        }
    }
    public function createHelp(){
        $data = ['data'=>AllAmountProvidavle::all()];
        $users = ['users'=>User::all()];
        return view('admin.create_help')->with($data)
                                        ->with($users);
    }
    public function createGet(){
        $data = ['data'=>AllAmountProvidavle::all()];
        $users = ['users'=>User::all()];
        return view('admin.create_get')->with($data)
                                        ->with($users);
    }

    private function getHelpId(){
        $id = $this->generateId();

        if (CompletedProvide::find($id)) {
            $this->getHelpId();
        }else{
            return $id;
        }
    }

    public function doCreateHelp(Request $req){
        $genSet = SettingTable::where('id', '=', 1)->first();
        $chargeRate = $genSet->rate;
        $rate = $chargeRate / 100;

        $req->validate([
            'email'=>'required|email',
            'amount'=>'required'
        ]);
        $profit = $req->amount * $rate;
        $total = $profit + $req->amount;

        $unique_id = $this->getHelpId();
        $result = CompletedProvide::create([
            'id'=>$unique_id,
            'email'=>$req->email,
            'amount'=>$req->amount,
            'rate'=>$chargeRate,
            'profit'=>$profit,
            'total'=>$total
        ]);
        if($result){
            return back()->with('success', "New Provide Help Request has been created");
        } else{
            return back()->with('fail', "Operation Failed");
        }

    }

    public function doCreateGet(Request $req){
        $req->validate([
            'email'=>'required|email',
            'amount'=>'required'
        ]);
        $user = User::where('email', $req->email)->first();
        $acct_name = $user['acct_name'];
        $acct_number = $user['acct_number'];
        $bank = $user['bank'];
        $phone = $user['phone'];
        if(!$acct_number){
            return back()->with('no_acct', "User Has not registered his/her account details");
        }
        else{
            $result = AllGetRequest::create([
                'get_help_id'=>$this->generateId(),
                'email'=>$req->email,
                'acct_name'=>$acct_name,
                'acct_number'=>$acct_number,
                'bank'=>$bank,
                'phone'=>$phone,
                'amount'=>$req->amount,
            ]);
    
            if($result){
                return back()->with('success', "New Get Help Request has been created");
            } else{
                return back()->with('fail', "Operation Failed");
            }
        }
    }

    public function view_provided(){
        $data = ['allProvided'=>RunningInvestment::all()];
        return view('admin.view_provided', $data);
    }

    public function reply(Request $req, $unique_id){
        $allMessages = ['allMessages'=>ChatSupport::where('unique_id', '=', $req->unique_id)->get()];
        $allTickets = ['allTickets'=>AllTickets::where('id', 'LIKE', $req->unique_id)->first()];
        return view('admin.reply')
                                    ->with($allMessages)
                                    ->with($allTickets);
    }

    public function replyMessage(Request $req){
        $req->validate([
            'reply'=>'required'
        ]);
        $result = ChatSupport::create([
            'unique_id'=>$req->reply_id,
            'email'=>$req->email,
            'ticket_type'=>$req->ticket_type,
            'reply'=>$req->reply
        ]);
        if($result){
            return back()->with('success', "Reply Has been Sent Successfully");
        } else{
            return back()->with('fail', "Operation Failed");
        }
    }

    public function settings(){
        $allAmount = ['allAmount'=>AllAmountProvidavle::all()];
        $sett = ['sett'=>SettingTable::first()];
        return view('admin.settings',$allAmount)
                                                ->with($sett);
    }

    public function changeRate(Request $req){
        $data = SettingTable::where('id','=', "1")->first();

        $req->validate([
           'rate'=>'required'
        ]);
        if(!$data){
            $result = SettingTable::create([
                'rate'=>$req->rate
            ]);
        }else{
            $result = $data->update([
                'rate'=>$req->rate
            ]);
        }

        if($result){
            return back()->with('successRate', "The Interest Rate has been changed Successfully");
        } else{
            return back()->with('failRate', "Operation Failed");
        }
    }
    public function addAmount(Request $req){
        $req->validate([
            'amountProv'=>'required'
        ]);
        $result = AllAmountProvidavle::create([
            'amountProv'=>$req->amountProv
        ]);
        if($result){
            return back()->with('successAmount', "A New amount has been added Successfully");
        } else{
            return back()->with('failAmount', "Operation Failed");
        }
    }
    public function deleteAmount(Request $req){
        $data = AllAmountProvidavle::where('amountProv', 'LIKE', $req->amountProv)->first();
        $req->validate([
            'amountProv'=>'required'
        ]);
        $result = $data->delete();
        if($result){
            return back()->with('deleteAmount', "Delete was Successfull");
        } else{
            return back()->with('failDelete', "Operation Failed");
        }
    }
    public function beforeGet(Request $req){
        $data = SettingTable::where('id','=', "1")->first();

        $req->validate([
           'beforeGet'=>'required'
        ]);
        if(!$data){
            $result = SettingTable::create([
                'beforeGet'=>$req->beforeGet
            ]);
        }else{
            $result = $data->update([
                'beforeGet'=>$req->beforeGet
            ]);
        }

        if($result){
            return back()->with('successBefore', "Update was Successfull");
        } else{
            return back()->with('failBefore', "Operation Failed");
        }
    }

    public function referral_manage(){
        $data = ['data'=>ReferralTable::all()];
        return view('admin.referral_manage')
                                            ->with($data);
    }
    public function deleteRef(Request $req){
        $data = ReferralTable::where('id', 'LIKE', $req->id)->first('ref_id');
        $result = $data->delete();

        if($result==1){
            return back()->with('deleted', "Delete was Successful");
        } else{
            return back()->with('notdeleted', "Operation Failed");
        }
    }
    public function testimonial(){
        return view('admin.testimonial');
    }
    public function createComment(Request $req){
        $result = Testimonials::create([
            'fullname'=>$req->fullname,
            'comment'=>$req->comment
        ]);

        if($result){
            return back()->with('success', "Message Sent Successfully");
        } else{
            return back()->with('fail', "Operation Failed");
        }
    }

    public function change_password(Request $request){
        $request->validate([
            'current_password'=>['required', new MatchOldPassword],
            'password'=>'required|confirmed|min:6'
        ]);
        $user = User::where('user_id', Auth::user()->user_id)->first();
        $user->update([
            'password'=>Hash::make($request->password)
        ]);

        return back()->with('success', "Your Password was Updated successfully");
    }
}
