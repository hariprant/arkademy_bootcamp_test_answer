function validateColor(hex){
    if(hex.charAt(0) == "#"){
        hexSub = hex.substr(1,hex.length);
        if(hexSub.length >= 3 && hexSub.length <= 6){
            let status = 0;
            let charLow = ["a","b","c","d","e","f"]; 
            let charUp = ["A","B","C","D","E","F"]; 
            for(let i=0; i < hexSub.length; i++ ){
                if(hexSub.charAt(i) >=0 && hexSub.charAt(i) <=9){
                    status += 1;
                }
                for (let j=0; j < charLow.length; j++) {
                    if(hexSub.charAt(i) == charLow[j] || hexSub.charAt(i) == charUp[j]){
                        status += 1;
                    }
                }
            }     
            if(hexSub.length == status){
                console.log(status)
                return "Format Hex Code Benar!";
            }else{
                console.log(status)
                return "Format Hex Code salah!";
            }
        }else{
            return "Format Hex Code salah!";
        }
    }else{
        return "Format Hex Code salah!";
    }
}