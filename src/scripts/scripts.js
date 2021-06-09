import './jquery';
import './fancybox';

// first Section Scroll
const firstSection = document.querySelectorAll('section');

if (firstSection[1]) {
  firstSection[1].id = 'first'; // Banner is always the first section
}

// Admin Notification Form
const clientCard = document.querySelector('.project__card--client');

if (clientCard) {
  const adminForm = document.querySelector('.admin__form .gform_wrapper');

  const clientName = clientCard.children[1];
  const clientNameFirst = clientName.children[0].innerHTML;
  const clientNameLast = clientName.children[1].innerHTML;
  const clientEmail = clientCard.children[2].innerHTML;

  const formFirstName = adminForm.children[1][1];
  const formLastName = adminForm.children[1][2];
  const formEmail = adminForm.children[1][3];

  formFirstName.value = clientNameFirst;
  formLastName.value = clientNameLast;
  formEmail.value = clientEmail;
}

// Full-Height Login Form
const loginContent = document.querySelector('.login');

if (loginContent) {
  const loginHeader = document.querySelector('.header');
  const loginFooter = document.querySelector('.footer');
  const windowHeight = window.innerHeight;

  const loginHeaderHeight = loginHeader.scrollHeight;
  const loginFooterHeight = loginFooter.scrollHeight;

  if (windowHeight >= 660) {
    loginContent.style.height = `${windowHeight - (loginFooterHeight + loginHeaderHeight)}px`;
  }
}
