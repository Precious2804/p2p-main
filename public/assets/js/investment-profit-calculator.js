(function ($) {
    "use strict";

    $(document).ready(function(){        
        
        // investmentment profit calculator //

        //--------------------------------------------------------------
        // global variable
        var singlePlan = $('.plan-select-list').find('.single-select-plan');
        var selectedPlanDisplayed = $('.displayed-selected-plan');
        // plan choosing dropdown
        function planTextReplace(packageName) {
            selectedPlanDisplayed.html(packageName)
        }
        singlePlan.on('click', function(e){
            e.preventDefault();
            var selector_selcectedPlan = $(this).siblings('.single-select-plan');
            var class_selectedPlan = selector_selcectedPlan.hasClass('selected-plan');
            var class_active = selector_selcectedPlan.hasClass('active');
            class_selectedPlan = true;
            class_active = true;

            if(class_selectedPlan === true && class_active === true) {
                selector_selcectedPlan.removeClass('selected-plan');
                selector_selcectedPlan.removeClass('active');
                $(this).addClass('selected-plan active');
            }
            var thisText = $(this).html();
            planTextReplace(thisText);
        });
        //--------------------------------------------------------------


        //--------------------------------------------------------------
        // global variable
        var singleCurrency = $('.currency-select-list').find('.single-currency-select');
        var sectedCurrencyDisplayed = $('.displayed-selected-currency');
        var currencySymbol = $('.part-amount').find('.currency-symbol');

        // currency sign variable
        var currencySign = '';
        var dollar_sign = '$';
        var euro_sign = '€';
        var bitcoin_sign = '฿';
        var ethereum_sign = 'Ξ';
        
        // currency choosing dropdown
        function currencyTextReplace(currencyName) {
            sectedCurrencyDisplayed.html(currencyName)
        }
        function currencyConvert(thisCurrencyVal) {
            var currencyVal = thisCurrencyVal;
            
            if(currencyVal == 'usd') {
                currencySign = dollar_sign;
            } else if(currencyVal == 'eur') {
                currencySign = euro_sign;
            } else if(currencyVal == 'btc') {
                currencySign = bitcoin_sign;
            } else if(currencyVal == 'eth') {
                currencySign = ethereum_sign;
            } else {
                currencySign = dollar_sign;
            }
        }
        singleCurrency.on('click', function(e){
            e.preventDefault();
            var x = $(this).siblings('.single-currency-select').hasClass('selected-currency');
            var y = $(this).siblings('.single-currency-select').hasClass('active')
            x = true;
            y = true;
            if(x == true && y == true) {
                $(this).siblings('.single-currency-select').removeClass('selected-currency');
                $(this).siblings('.single-currency-select').removeClass('active');
            }
            $(this).addClass('selected-currency active');
            var thisText = $(this).html();
            currencyTextReplace(thisText);
            
            currencyConvert($(this).data('currency'));

            currencySymbol.html(currencySign);
        });
        //--------------------------------------------------------------


        //--------------------------------------------------------------
        // update variable
        var currencySign = dollar_sign;
        // result is animated
        function animatedResults() {
            $('.part-result').find('.number').addClass('animated fadeIn');
            setTimeout(function() { 
                $('.part-result').find('.number').removeClass('animated fadeIn');
            }, 500);
        }
        // show result
        function showResults() {
            var partResult = $('.part-result');
            var investedAmount = parseInt($('.inputted-amount').val());
            var parcentageNumber = $('.selected-plan.active').data('parcentage');
            var termLenght = $('.selected-plan.active').data('days');
            var ab = investedAmount / 100;
            var cd = ab * parcentageNumber;
            var netProfit = cd * termLenght;
            var totalPercent = parcentageNumber * termLenght;
            var dailyProfit = netProfit / termLenght;
            var totalReturn = netProfit + investedAmount;

            partResult.find('.js_totalPercentage').html(totalPercent.toFixed(2) + '%');
            partResult.find('.js_dailyProfit').html(currencySign + dailyProfit.toFixed(2));
            partResult.find('.js_netProfit').html(currencySign + netProfit.toFixed(2));
            partResult.find('.js_totalReturn').html(currencySign + totalReturn.toFixed(2));
        }
        function calculateBtnText(textSelector, textSelector2) {
            textSelector.html('calculating..');
            setTimeout(function() {
                textSelector.text('calculated');
                textSelector.addClass('calculated');
                textSelector2.css({'opacity':'1', 'visibility':'visible'});
            }, 1000);

            function removeClassCalculated() {
                textSelector.removeClass('calculated');
                textSelector.text('calculate');
                textSelector2.css({'opacity':'0', 'visibility':'hidden'});
            }

            singleCurrency.on('click', function(){
                removeClassCalculated();
            });
            singlePlan.on('click', function(){
                removeClassCalculated();
            });
            $('.inputted-amount').on('click', function(){
                removeClassCalculated();
            });
        }
        $('.profit-calculator').find('.calculate-all').on('click', function(e){
            e.preventDefault();
            

            var comparing_with_inputted_amount = $('.inputted-amount').val();
            var maxAmount = $('.selected-plan').data('max-amount');
            var minAmount = $('.selected-plan').data('min-amount');
           

            if(comparing_with_inputted_amount >= minAmount && comparing_with_inputted_amount <= maxAmount) {
                setTimeout(function() {
                    showResults();
                    animatedResults();
                    toastr["success"]("Successfully calculated");
                }, 1000);
                calculateBtnText($(this), $(this).parents().find('.fa-check'));
            } else {
                if(comparing_with_inputted_amount < minAmount) {
                    toastr["error"]("this package has minimum amount is" + ' ' + currencySign + minAmount);
                } else if (comparing_with_inputted_amount > maxAmount) {
                    toastr["error"]("this package has maximum amount is" + ' ' + currencySign + maxAmount);
                }
            }
        });

    });
}(jQuery));	