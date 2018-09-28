//Leetcode: 771. Jewels and Stones(easy)

var numJewelsInStones = function(inputJ, inputS){
    var jType = [];
    var jLength = inputJ.length;
    while(jLength--){
        console.log('char: ', inputJ.charAt(jLength));
        var isExist = false;
        jType.forEach(element => {
            if(element == inputJ.charAt(jLength)){
                isExist = true;
                return false;
            }
        });
        if(!isExist){
            jType.push(inputJ.charAt(jLength));
        }
        
    } //find jewwls

    var sLength = inputS.length;
    var outputJewels = 0;
    while(sLength--){
        jType.forEach(element => {
            if(element == inputS.charAt(sLength)){
                outputJewels++;
            }
        });
    }

    return outputJewels;
}

console.log(numJewelsInStones("aaaA", "aAAbbbb"));

//2018-9-29 accept