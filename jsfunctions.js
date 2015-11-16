/**
 * Created by Chris on 11/16/2015.
 */

function duplicatedCheck(value , array){
    for (var i = 1; i < array.length; i++) {
        console.log(array[i]+" "+i);
        if (value === array[i]) {
            return i;
        }
    }
    return false;
}