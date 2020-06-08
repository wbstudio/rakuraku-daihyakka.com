$(window).on('load', function () {
    
    
    // console.log(endyear);

    //date pull_down
    // $('.selectDate').change(function(e) {
    //     if ($(e.target).hasClass("selectYear") || $(e.target).hasClass("selectMonth")){
    //     var getMonthDays = function(year, month) {
    //         return new Date(parseInt(year,10), parseInt(month,10), 0).getDate();
    //     };

    //     var daynum = getMonthDays($(e.currentTarget).find('.selectYear').val(),$(e.currentTarget).find('.selectMonth').val());
    //     var selectedday = $(e.currentTarget).find('.selectDay').val();
    //     $(e.currentTarget).find('.selectDay').empty();
    //     for (var i = 0; i < daynum; ++i){
    //         var v = ( '00' + (i + 1) ).slice( -2 );
    //         $(e.currentTarget).find('.selectDay').append('<option value="' + v + '"' + (selectedday == v ? 'selected="selected"':"") + '>' + (i + 1) + '</option>');
    //     }
    //     if ( $(e.currentTarget).find('.selectDay').val() != selectedday) {
    //         $(e.currentTarget).find('.selectDay').val( $(e.currentTarget).find('.selectDay').find("option").filter(":last").val() );
    //     }
    //     }
    // });

    //今の時間のセット
    $('.selectDate').each(function(){
    //     var today = new Date();
    //     var startyear = 2020;
    //     var endyear = today.getFullYear() + 3; // +nは表示される項目数がn
    //     var selectedyear = parseInt($(this).find('.selectYear').val(),10);
    //     $(this).find('.selectYear').empty();
    //     for (var i = startyear; i < endyear; ++i){
    //         $(this).find('.selectYear').append('<option value="' + i + '">' + i + '</option>');
    //     }
    //     $(this).find('.selectYear').val(selectedyear);

    //     var selectedmonth = $(this).find('.selectMonth').val();
    //     $(this).find('.selectMonth').empty();
    //     for (var i = 1; i < 13; ++i){
    //         $(this).find('.selectMonth').append('<option value="' + ("00" + i).slice(-2) + '">' + i + '</option>');
    //     }
    //     $(this).find('.selectMonth').val(selectedmonth);

    //     var selectedhour = $(this).find('.selectHour').val();
    //     $(this).find('.selectHour').empty();
    //     for (var i = 0; i < 24; ++i){
    //         $(this).find('.selectHour').append('<option value="' + ("00" + i).slice(-2) + '">' + i + '</option>');
    //     }
    //     $(this).find('.selectHour').val(selectedhour);

    //     var selectedminute = $(this).find('.selectMinute').val();
    //     $(this).find('.selectMinute').empty();
    //     for (var i = 0; i < 60; i = i +5){
    //         $(this).find('.selectMinute').append('<option value="' + ("00" + i).slice(-2) + '">' + i + '</option>');
    //     }
    //     $(this).find('.selectMinute').val(selectedminute);

    //     if ($(this).hasClass("initDate")) {
    //         $(this).find('.selectYear').val(""+today.getFullYear());
    //         $(this).find('.selectMonth').val(("00" + (today.getMonth()+1)).slice(-2));
    //         $(this).find('.selectYear').change();
    //         $(this).find('.selectDay').val( ("00" + today.getDate() ).slice(-2) );
    //         $(this).find('.selectHour').val( ("00" + today.getHours () ).slice(-2) );
    //         if(today.getMinutes() % 5 == 0){
    //             $(this).find('.selectMinute').val( ("00" + today.getMinutes() ).slice(-2) );
    //         }else{
    //             if((("00" + today.getMinutes()).slice(-1)) < 5){
    //                 var TenthPlace = ("00" + today.getMinutes()).slice(-2).slice(0,1);
    //                 $(this).find('.selectMinute').val( (TenthPlace +"5" ));
    //             }else{
    //                 var TenthPlace = ("00" + today.getMinutes()).slice(-2).slice(0,1);
    //                 TenthPlace = Number(TenthPlace) + 1;
    //                 if(TenthPlace < 6){
    //                     $(this).find('.selectMinute').val( (String(TenthPlace) +"0" ));
    //                 }else{
    //                     $(this).find('.selectMinute').val("00");
    //                 }
    //             }

    //         }
    //     } else {
    //     $(this).find('.selectYear').change();
    //     }
    });


});