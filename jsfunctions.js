/**
 * Created by Chris on 11/16/2015.
 */

function duplicatedCheck(value , array){

    for (var i = 0; i < array.length; i++) {
        //if it already exists we're deselecting that booth
        console.log(i);
        if (value === array[i]) {
            console.log(value +" "+array[i]);
            array.splice(i, 1);
            console.log("value spliced");
            i = array.length;//may as well end the loop we found it
        }
        else {
            //it's a new booth, adding it to the array
            array.push(value);
            console.log("value pushed");
        }
    }
    console.log(array);
    return array;
}