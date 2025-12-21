// Minimal front-end functionality + scroll reveal
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

  // Stagger card delays
  const cardReveals = document.querySelectorAll('.cards .card.reveal');
  cardReveals.forEach((el, i)=> el.style.transitionDelay = `${i * 120}ms`);

  // IntersectionObserver to reveal elements on scroll
  const revealElements = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries, obs)=>{
    entries.forEach(entry=>{
      if(entry.isIntersecting){
        entry.target.classList.add('active');
        obs.unobserve(entry.target);
      }
    });
  },{threshold:0.12});

  revealElements.forEach(el=> observer.observe(el));
});