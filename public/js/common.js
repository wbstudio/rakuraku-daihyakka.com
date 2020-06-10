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