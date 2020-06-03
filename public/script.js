let cart = document.getElementsByClassName('cart');
let len = cart.length;
let items = [];

for(let i = 0; i<len;i++){
  let d =document.getElementsByClassName('cart')[i]
   d.addEventListener('click',()=>{
     let cost = document.getElementsByClassName('cart')[i].value;
     items.push(parseInt(cost)); 

    let total = items.reduce((previous, current)=>{
  return previous + current;
    },0)

  const dom = document.getElementById('total');
  dom.style.display="block";
  dom.textContent = `Total : ${total}`
   })
}
