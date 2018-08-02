function hexToRgb(hexCode) {
    var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
    var matches = patt.exec(hexCode);
    var rgb = "rgb(" + parseInt(matches[1], 16) + "," + parseInt(matches[2], 16) + "," + parseInt(matches[3], 16) + ")";
    return rgb;
}

function hexToRgba(hexCode, opacity) {
    var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
    var matches = patt.exec(hexCode);
    var rgb = "rgba(" + parseInt(matches[1], 16) + "," + parseInt(matches[2], 16) + "," + parseInt(matches[3], 16) + "," + opacity + ")";
    return rgb;
}

function verif_integer(champb){
    var chiffresb = new RegExp("[0-9]");
    var verifb;
    for(x = 0; x < champb.value.length; x++){
    verifb = chiffresb.test(champb.value.charAt(x));
    if(verifb == false){
    champb.value = champb.value.substr(0,x) + champb.value.substr(x+1,champb.value.length-x+1); x--;
     }
     }
     }

     function onlyNumber()
   {
    var champ = document.getElementById('champ');
    while (champ.value.match(/[^0-9]/))
    {
        //champ.value = champ.value.replace(/[^0-9]/,'');
        return false;
    }
   }
// Formatage d'un champs texte
function valid_text(evt) {
    var keyCode = evt.which ? evt.which : evt.keyCode;
    var interdit = '1234567890àâäãçéèêëìîïòôöõùûüñ&*?!:;,+°\t#~"^¨%$£?²¤§%*()[]{}<>=-_|\\/`\'';
    if (interdit.indexOf(String.fromCharCode(keyCode)) >= 0) {
        return false;
    }
}

// Formatage d'un champ number
function valid_number(evt) {
    var keyCode = evt.which ? evt.which : evt.keyCode;
    var interdit = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZàâäãçéèêëìîïòôöõùûüñ &*?!:;,+°\t#~"^¨%$£?²¤§%*()[]{}<>=-_|\\/`\'';
    if (interdit.indexOf(String.fromCharCode(keyCode)) >= 0) {
        return false;
    }
}

function verifie_text(evt) {
        var keyCode = evt.which ? evt.which : evt.keyCode;
        var accept = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if (accept.indexOf(String.fromCharCode(keyCode)) >= 0) {
            return true;
        } else {
            return false;
        }
    }

     function verifie_number(evt) {
        var keyCode = evt.which ? evt.which : evt.keyCode;
        var accept = '0123456789';
        if (accept.indexOf(String.fromCharCode(keyCode)) >= 0) {
            return true;
        } else {
            return false;
        }
    }

 function verifie(evt) {
        var keyCode = evt.which ? evt.which : evt.keyCode;
        var accept = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        if (accept.indexOf(String.fromCharCode(keyCode)) >= 0) {
            return true;
        } else {
            return false;
        }
    }