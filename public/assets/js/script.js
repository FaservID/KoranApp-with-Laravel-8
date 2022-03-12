/*
  nama : candra dwi cahyo
  umur : 17 tahun
  email : candradwicahyo18@gmail.com
*/

// library aos
AOS.init({
  once: true
})

function navbar() {
  
  // ketika mengscroll halaman, maka berikan class active ke navbar
  const navContainer = document.querySelector('.nav-container');
  window.addEventListener('scroll', function() {
    navContainer.classList.toggle('active', this.scrollY > 0);
  });
  
  // ketika menekan tombol hamburger menu, maka tampilkan menu sidebarnya
  const navBoxList = navContainer.querySelector('.nav-box1');
  const navToggle = navContainer.querySelector('.nav-toggle');
  navToggle.addEventListener('click', () => {
    navBoxList.classList.toggle('active');
  });

  // ketika menekan list li di navbar, maka pindahkan class active ke list lainnya yang ditekan
  const navListItem = navContainer.querySelectorAll('ul li');
  navListItem.forEach(li => {
    li.addEventListener('click', function(event) {
      navListItem.forEach(li => li.classList.remove('active'));
      this.classList.add('active');
    });
  });

}

navbar();
