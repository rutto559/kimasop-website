function greet(callback)
{
  callback();
}
greet(function (){
  console.log('Hello from the cllback!')
}); 