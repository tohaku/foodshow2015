/**
 * Created by Chris on 11/16/2015.
 */

function duplicatedCheck(value , array){
    //var counter = 0;
    for (i=0;i<=array.length();i++){
        //if it already exists we're deselecting that booth
        if(value==array[i]){
            array.splice(i,1);
            i=array.length();//may as well end the loop we found it
        }
        else{
            //it's a new booth, adding it to the array
           array.push(value);
        }
    }
    return array;
}