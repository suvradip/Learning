var data=[];
var int1, int2, int3;
		 


function reset()
{
//reset of text boxes.	
document.getElementById("name").value="";
document.getElementById("email").value="";
document.getElementById("country").value="";
document.getElementById("address").value="";

//reset of radio buttons.
 var ele = document.getElementsByName("sex");
   for(var i=0;i<ele.length;i++)
      ele[i].checked = false;

//reset of checkboxes
document.getElementById("cb1").checked = false;
document.getElementById("cb2").checked = false;
document.getElementById("cb3").checked = false;

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

//gets the all value from text boxes	
var n=document.getElementById("name").value;
var e=document.getElementById("email").value;
var c=document.getElementById("country").value;
var a=document.getElementById("address").value;
var cb1=document.getElementById("cb1");
var cb2=document.getElementById("cb2");
var cb3=document.getElementById("cb3");

checkboxValue(cb1,cb2,cb3);

var gender =  radioCheckedValue("sex");
//storing this data in Jason 
	data.push({
						"name":n,
						"email":e,
						"country":c,
						"address":a,
						"sex":gender,
						"interest1":int1,
						"interest2":int2,
						"interest3":int3

				   });

	//console.log(data);
}


// to view all data, run this function from console eg. showdata();

function showdata()
{
for(var i in data)
{
	console.log("--------------------")
	console.log("Data Object "+ i );
	console.log("--------------------")
	console.log("Name is : "+data[i].name);
	console.log("Email is : "+data[i].email);
	console.log("Country is : "+data[i].country);
	console.log("Address is : "+data[i].address);
	console.log("sex is : "+data[i].sex);
	console.log("Interest 1 is : "+data[i].interest1);
	console.log("Interest 2 is : "+data[i].interest2);
	console.log("Interest 3 is : "+data[i].interest3);
	

}
	
}