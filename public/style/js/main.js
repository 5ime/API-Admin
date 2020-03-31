window.addEventListener('load', () => {
  $('h1').addClass('ready');
  $('.bio').addClass('ready');
  $('li').addClass('ready');
});
// document.addEventListener('mousemove', (e) => {
//   const [offsetX, offsetY] = [e.x / document.body.clientWidth, e.y / document.body.clientHeight];
//   $('h1').setStyle(`transform`,`translate(${-10 + 20 * offsetX}px,${-10 + 20 * offsetY}px)`);
//   $('.bio').setStyle(`transform`,`translate(${5 - 10 * offsetX}px,${-5 + 10 * offsetY}px)`);
// });