function countChar(word, char){
    result = 0;
    for (var i = 0; i < word.length; i++) {
        if(word.charAt(i) == char){
            result += 1;
        }
    }
    if(result != 0){
        return result;
    }else{
        return "Not Found!";
    }
}