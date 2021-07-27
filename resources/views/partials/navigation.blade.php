<div class="db-user-profile">
    <div class="part-data">
        <span class="name">{{auth()->user()->username }}</span>
        <span style="color: #fff">Refferal ID: {{auth()->user()->username}}</span>
    </div>

    <div class="part-img">
        <img src="{{ asset('uploads/site/'.auth()->user()->image) }}" alt="">
    </div>
</div>
