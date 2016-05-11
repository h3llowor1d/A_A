/**
 * Created by han on 2015/4/19.
 */
$(function(){
    $area = $("#area");
    $provice = $("<select name='provice' class='form-control' style='width:33.33%'></select>");
    $city = $("<select name='city' class='form-control' style='width:33.33%'></select>");
    $town = $("<select name='town' class='form-control' style='width:33.33%'></select>");

    getProvice();
    getCity();
    getTown();

    function getArea(id){
        var ret = [];
        for(var i in areas){
            if($.inArray(id+"",areas[i]) === 1){
                var tmp = [i];
                tmp = $.merge(tmp,areas[i]);
                ret.push(tmp);
            }
        }
        return ret;
    }

    function getProvice(defalut){
        var id = defalut;
        var provice = getArea(0);
        for(var i in provice){
            $provice.append("<option value='"+provice[i][0]+"'>"+provice[i][1]+"</option>");
        }
        $area.find('option[value='+defalut+']').attr('selected','selected');//？
        $area.append($provice);
    }

    function getCity(id){
        $city.html("");
        var areaid = id || $provice.val();
        var city = getArea(areaid);
        for(var i in city){
            $city.append("<option value='"+city[i][0]+"'>"+city[i][1]+"</option>");
        }
        //$area.find('option[value='+city+']').attr('selected','selected');
        $area.append($city);
    }

    function getTown(id){
        $town.html("");
        var areaid = id || $city.val();
        var town = getArea(areaid);
        for(var i in town){
            $town.append("<option value='"+town[i][0]+"'>"+town[i][1]+"</option>");
        }
        //$area.find('option[value='+city+']').attr('selected','selected');
        $area.append($town);
    }

    $provice.change(function(){
        var pid = $provice.val();
        getCity(pid);
        var cid = $city.val();
        getTown(cid);
    });

    $city.change(function(){
        var cid = $city.val();
        getTown(cid);
    });
});