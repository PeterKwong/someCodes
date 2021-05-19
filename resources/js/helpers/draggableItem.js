export function draggableItem(item) {
  let isDown = false;
  let startX;
  let scrollLeft;

  item.addEventListener('mousedown', (e) => {
    isDown = true;
    item.classList.add('active');
    startX = e.pageX - item.offsetLeft;
    scrollLeft = item.scrollLeft;
  });
  item.addEventListener('mouseleave', () => {
    isDown = false;
    item.classList.remove('active');
  });
  item.addEventListener('mouseup', () => {
    isDown = false;
    item.classList.remove('active');
  });
  item.addEventListener('mousemove', (e) => {
    if(!isDown) return;
    e.preventDefault();
    const x = e.pageX - item.offsetLeft;
    const walk = (x - startX) * 3; //scroll-fast
    item.scrollLeft = scrollLeft - walk;
  });
}