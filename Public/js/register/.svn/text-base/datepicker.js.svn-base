$(function () {
    var $datePicker = $("#datepicker");
    var $year = $("<select name='year' class='form-control'></select>");
    var $month = $("<select name='month' class='form-control'></select>");
    var $day = $("<select name='day' class='form-control'></select>");

    getYear(1990);
    getMonth();
    getDay(1,1);

    function getYear(y) {
        var year = y || 1980;
        var yearEnd = parseInt(new Date().getFullYear());
        var yearStart = 1960;
        for (var i = yearEnd; i >= yearStart; i--) {
//                if(year == i)
//                    $year.append('<option value="' + i + '" selected>' + i + '年</option>');
//                else
            $year.append('<option value="' + i + '">' + i + '年</option>');
        }
        $year.find('option[value='+year+']').attr('selected','selected');

        $datePicker.append($year);
    }

    function getMonth() {
        for (var i = 1; i <= 12; i++) {
            $month.append('<option value="' + i + '">' + i + '月</option>');
        }

        $datePicker.append($month);
    }

    function getDay(d,current) {
        if (d == 28 || d == 29 || d == 30 || d == 31) {
            var day = d;
        } else {
            var day = 31;
        }

        var c = current || 1;

        $day.html("");
        for (var i = 1; i <= day; i++) {
            $day.append('<option value="' + i + '">' + i + '日</option>');
        }
        $day.find('option[value='+c+']').attr('selected','selected');
        $datePicker.append($day);
    }

    //$datePicker.find('#year').on('change');

    $year.change(function(){
        handle();
    });

    $month.change(function(){
        handle();
    });

    /*$datePicker.change(function(){
     handle();
     });
     */

    function handle(){
        var year = $year.val();
        var leapYear = isLeapYaer(year);
        var month = parseInt($month.val());
        var day = parseInt($day.val());
        //var supBig=[1,2,3,4,5,6,7,8,9,10,11,12];
        var Big = [1,3,5,7,8,10,12];
        var Small = [4,6,9,11];
        if(month == 2){
            if(leapYear !== "" && leapYear !== null && leapYear !== false){
                getDay(29,day);
                return
            }else{
                getDay(28,day);
                return;
            }
        }

        if($.inArray(month,Big) !== -1){
            getDay(31,day);
            return;
        }else{
            getDay(30,day);
            return;
        }
    }


    function isLeapYaer(y){
        if(isNaN(parseInt(y))) return;
        var year = parseInt(y);
        if((year%4==0 && year%100!=0)||(year%100==0 && year%400==0)){
            return true;
        }else{
            return false;
        }


    }


})