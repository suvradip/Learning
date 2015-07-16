
var int1, int2, int3;
		 
function tabToggle(x)
{
	
	if(x==1)
	{	
	document.getElementById("x1").style.zIndex = "0";
	document.getElementById("x2").style.zIndex = "1";
	document.getElementById("tab1_h2").style.backgroundColor = "#FFFFFF";
	document.getElementById("tab2_h2").style.backgroundColor = "#E4EFFF";
	document.getElementById("tab1_h2_a").style.color = "#717171";
	document.getElementById("tab2_h2_a").style.color = "#09569d";
	}
	else
	{
	document.getElementById("x1").style.zIndex = "1";
	document.getElementById("x2").style.zIndex = "0";
	document.getElementById("tab1_h2").style.backgroundColor = "#E4EFFF";
	document.getElementById("tab2_h2").style.backgroundColor = "#FFFFFF";
	document.getElementById("tab1_h2_a").style.color = "#09569d";
	document.getElementById("tab2_h2_a").style.color = "#717171";
	
	}
}	


function checkboxValue(cb1,cb2,cb3)
{
    
	int1="";
	int2="";
	int3="";

    if (cb1.checked == true)
    {
         int1 = cb1.value;
    }

    if (cb2.checked == true)
    {
         int2 = cb2.value;
    }
   
    if (cb3.checked == true)
    {
         int3 = cb3.value;
    }
    
}



function radioCheckedValue(rname)
{
  var test = document.getElementsByName(rname);
    for (i=0; i < test.length; i++)
     {
        if(test[i].checked==true) 
        return test[i].value;   		 
    }
}


function getData()
{

//checking textboxe values
if(document.getElementById("name").value!="" && document.getElementById("email").value!=""  && document.getElementById("country").selectedIndex!=0 && document.getElementById("address").value!=""  )
		{

			//gets the all value from text boxes	
			var n=document.getElementById("name").value;
			var e=document.getElementById("email").value;
			var ele = document.getElementById("country");
			var c = ele.options[ele.selectedIndex].text;

			var a=document.getElementById("address").value;
			var cb1=document.getElementById("cb1");
			var cb2=document.getElementById("cb2");
			var cb3=document.getElementById("cb3");

			checkboxValue(cb1,cb2,cb3);

			var gender =  radioCheckedValue("sex");
			//storing this data in Jason 

				var data=({
									"name":n,
									"email":e,
									"country":c,
									"address":a,
									"sex":gender,
									"interest1":int1,
									"interest2":int2,
									"interest3":int3

							   });

				console.log(JSON.stringify(data));
		}


}
