var mydot=true;
var MEMORY=0;

function textEnter(bid)
{

if(bid.value==".")
{
  if(mydot)
  {
  document.getElementById('textbox').value+=bid.value;
  mydot=false;
  }

}
else
{
  if(bid.value=="+" || bid.value=="-" || bid.value=="*" || bid.value=="/")
  {
    mydot=true;
  }
  document.getElementById('textbox').value+=bid.value;
}



}


function calculate()
{

    var store=document.getElementById('textbox').value+"$";
    var numbers=[];
    var operators=[];
    var p=0,c=0,f="";
    for(var i=0; i<store.length;i++)
    {

             if(store[i]=="+" ||store[i]=="-"||store[i]=="*"||store[i]=="/"||store[i]=="%"||store[i]=="R" ||store[i]=="$" )
             {
               operators.push(i);
               if(store[i]!="$")
               f=store[i];
             }


    }

          //  console.log(operators);

        for(var r=0;r<operators.length;r++)
        {
           c=operators[r];
            var num="";
          for(var j=p; j<c;j++)
          {
            num+=store[j];
          }

            numbers.push(parseFloat(num));
          p=c+1;
        }


     //  console.log(numbers);

   // console.log(sum(numbers));
    //document.getElementById('textbox').value=div(numbers);


    if(f=="+")
    document.getElementById('textbox').value=sum(numbers);
    else if(f=="-")  document.getElementById('textbox').value=sub(numbers);
    else if(f=="*")  document.getElementById('textbox').value=mult(numbers);
    else if(f=="/")  document.getElementById('textbox').value=div(numbers);
    else if(f=="%")  document.getElementById('textbox').value=percent(numbers);
    else if(f=="R")  document.getElementById('textbox').value=rem(numbers);
}


function sum(numbers)
{
    var res=0;
    for(var i=0; i<numbers.length;i++)
    {
       res+=numbers[i];
    }

    return res;
}


function mult(numbers)
{
   var res=1;
    for(var i=0; i<numbers.length;i++)
    {
       res*=numbers[i];
    }

    return res;
}


function sub(numbers)
{
   var res, p=0;
    for(var i=0; i<numbers.length;i++)
    {


       if(p!==0)
       {
            res-=numbers[i];
       }else
       {
         p=1;
         res=numbers[i];
       }

    }

    return res;
}


function div(numbers)
{
   var res, p=0;
    for(var i=0; i<numbers.length;i++)
    {
       if(p!==0)
       {
            res/=numbers[i];
       }else
       {
         p=1;
         res=numbers[i];
       }

    }

    return res;
}



function clearTbx()
{
  var v1=document.getElementById('textbox');
  v1.value="";
    mydot=true;
}


function cancel()
{
 var t=document.getElementById('textbox').value;
/* var pos=0, s="";
 for(var i=t.length;i>0;i--)
 {
   if(t[i]=="+" || t[i]=="*" || t[i]=="-" || t[i]=="/")
   {
      pos=i;
      break;
   }
 }

 for(var i=0;i<pos;i++)
 {
  s+=t[i];
 }

document.getElementById('textbox').value=s;*/

document.getElementById('textbox').value=t.substring(0,t.length -1);

}


function percent(numbers)
{



   return numbers[0]/100;


}


function rem(numbers)
{
 var res;

    if(numbers[0]>numbers[1])
     res=numbers[0] % numbers[1];
   else
     res="wrong input format.";

   return res;
}


function memoryOperation(op)
{
  var v =document.getElementById('textbox').value;
  var sm=document.getElementById('mtxt');

      if(op.value=="M+")
      {
         MEMORY+=parseFloat(v);
         sm.style.visibility="visible";
      }

      else if(op.value=="M-")
      {
        MEMORY-=parseFloat(v);
        sm.style.visibility="visible";
      }
      else if(op.value=="MC")
      {
        MEMORY=0;
        sm.style.visibility="hidden";
      }
      else if(op.value=="MR")
      {
       document.getElementById('textbox').value=MEMORY;
       sm.style.visibility="visible";
      }

}


function isNumberKey(e)
 {
   
    var unicode=e.charCode? e.charCode : e.keyCode;
   
    if (unicode!=8)//if the key isn't the backspace key (which we should allow)
    { 
        if (unicode>45 && unicode <57) //if not a number
            return true ;
        else if(unicode==42 || unicode==43)
            return true ;
        else 
            return false;  
         
    }

}
