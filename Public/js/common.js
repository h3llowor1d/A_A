/**
 * Created by rainsoft-mc on 2015/4/16.
 */

/**
 * 添加数组的原形态方法
 * remove(val) 查找 val 并删除
 */
/*
(function(){
    Array.prototype.indexOf = function(val) {
        for (var i = 0; i < this.length; i++) {
            if (this[i] == val) return i;
        }
        return -1;
    };
    Array.prototype.remove = function(val) {
        var index = this.indexOf(val);
        if (index > -1) {
            this.splice(index, 1);
        }
    };
})();
*/
