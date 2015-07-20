
function numbercheck(e)
{
    var unicode=e.charCode? e.charCode : e.keyCode
    if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57) //if not a number
            return false //disable key press
    }
}

	

function getRandomInt() 
{
 return Math.floor(Math.random() * 90) + 10;
}	

function createMaincontainer()
{
	var mainContainer = document.createElement("div");
	mainContainer.id = "mainContainer";
	document.body.appendChild(mainContainer);

}

	
function create(sign)
{
	document.getElementById('mainContainer').innerHTML="";
	var r1=0; r2=0, temp=0;

	for(var i = 0; i < 20; i++) 
	{
	   var divBlock = document.createElement("div");                
	   divBlock.className = "blocks";
	   mainContainer.appendChild(divBlock);
	   

	   r1=getRandomInt();
	   r2=getRandomInt();

	  
	  
	  	if(r1<r2)
	  	{
	  		temp=r1;
	  		r1=r2;
	  		r2=temp;
	  	}
	  

	   var s1= document.createElement("span");
	   s1.id="s1_"+i;
	   s1.innerText=r1;	

	   var s2=document.createElement("span");
	   s2.id="s2_"+i;
	   s2.innerText=sign+r2;	

	   var input = document.createElement("input");
	   input.type="text";
	   input.id=i;
	   input.onkeypress=function() {
	   									return numbercheck(event);
		  							  
								   };


		input.onkeyup=function(){
									rtl(this);
									checkResult(this.id);
								};

		/*var plus=document.createElement("span");
		plus.className="plus";
		plus.innerText="+";*/

		divBlock.appendChild(s1);
		divBlock.appendChild(s2);						   
		/*divBlock.appendChild(plus);*/

	   divBlock.appendChild(input);
	}
            
}


var temp="";
function checkResult(a)
{


var v1=document.getElementById("s1_"+a).innerHTML;
var v2=document.getElementById("s2_"+a).innerHTML;
var v3=document.getElementById(a);

var res= parseInt(v1) + parseInt(v2);




if(v3.value==res)
{
	v3.style.backgroundColor="#99FF33";
}
else
{

	v3.style.backgroundColor="red";
}	


console.log(res);

}




function rtl(element)
{   
   /* if(element.setSelectionRange){
    	element.focus();
        element.setSelectionRange(0,0);
        
        
    }*/

   
        if (element.createTextRange) {
            var part = element.createTextRange();
            part.move("character", 0);
            part.select();
        }else if (element.setSelectionRange){
            element.setSelectionRange(0, 0);}
        element.focus();


}
