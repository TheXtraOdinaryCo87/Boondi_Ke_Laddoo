// Minimal front-end functionality
document.addEventListener('DOMContentLoaded',()=>{
  const form = document.getElementById('contactForm');
  if(form){
    form.addEventListener('submit', e=>{
      e.preventDefault();
      const msg = document.getElementById('formMsg');
      msg.textContent = 'Thanks! Your message was received (demo).';
      msg.style.color = 'green';
      form.reset();
    });
  }
});