let dropdown=document.querySelector('.dropdown');
dropdown.onclick=function()
{
  dropdown.classList.toggle('active');
}

document.querySelector
const plus= document.querySelector('.plus'),
minus= document.querySelector('.minus'),
num= document.querySelector('.num');

let a=1;
plus.addEventListener("click",()=>{
  a++;
  a = (a<=4) ?  a : b;
  document.getElementById('textBox').value=a+" Passager";
  num.innerText=a;
  console.log(a);
  b=a;
});

minus.addEventListener('click',()=>{
  a--;
  b=1;
  a = (a==0) ?  b : a;
  document.getElementById('textBox').value=a+" Passager";
  num.innerText=a;
  console.log(a);
});


