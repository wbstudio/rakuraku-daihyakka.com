$(window).on('load', function () {

    // datepickerとselectに現時刻を入れる
    var NowTime = new Date();
    function zeroPadding(num,length){
        return ('0' + num).slice(-length);
    }
    var Mon = zeroPadding(NowTime.getMonth()+1,2),
        Day = zeroPadding(NowTime.getDate(),2);
    var NowDate = NowTime.getFullYear()+"/"+Mon+"/"+Day,
        NowHour = NowTime.getHours(),
        NowMin  = NowTime.getMinutes();
    
        $("#NowDaySet").val(NowDate);
        $("#NowHorSet").val(NowHour);
        $("#NowMinSet").val(NowMin);

    $('#delete').click(function(){
        if(!confirm('本当に削除しますか？')){
            /* キャンセルの時の処理 */
            return false;
        }
    });
});
//アコーディオン
$(function(){
    $('.sub_menu').hide();
    $('.menu_in').click(function(){
        $('img').removeClass('rotate');
        $('ul.sub_menu').slideUp();
        if($('+ul.sub_menu',this).css('display') == 'none'){
            $('img',this).addClass('rotate');
            $('+ul.sub_menu',this).slideDown();
        }
    });
});
//ハンバーガー
$(function(){
    $('.hamburger').on('click', function() {
        if($('.menu-container .main_menu').css('display') === 'block') {
            $('.menu-container .main_menu').slideUp('1500');
        }else {
            $('.menu-container .main_menu').slideDown('1500');
        }
    })
});

//画面幅で表示コンテンツと非表示コンテンツを分ける
var disp_width = $(window).width();
if(disp_width < 480){
    //SP
    $(".pc").css("display","none");
}else{
    //PC
    $(".sp").css("display","none");
}
