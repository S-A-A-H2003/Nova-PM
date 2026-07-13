/*
  Global confirm-before-submit for forms that opt-in via:
    data-requires-confirm="true"
  Uses SweetAlert2 (Swal) which is already loaded globally in layouts/app.blade.php
*/

document.addEventListener('submit', (event) => {
  const form = event.target;
  if (!(form instanceof HTMLFormElement)) return;

  if (form.getAttribute('data-requires-confirm') !== 'true') return;

  // If Swal isn't available for any reason, just allow submit.
  if (typeof window.Swal === 'undefined' || typeof window.Swal.fire !== 'function') return;

  const title = form.getAttribute('data-confirm-title') || 'Confirm submission';
  const text = form.getAttribute('data-confirm-text') || 'Are you sure you want to submit?';
  const confirmButtonText = form.getAttribute('data-confirm-button-text') || 'Confirm';
  const cancelButtonText = form.getAttribute('data-confirm-cancel-button-text') || 'Cancel';

  event.preventDefault();

  window.Swal.fire({
    title,
    text,
    icon: 'question',
    showCancelButton: true,
    confirmButtonText,
    cancelButtonText,
    confirmButtonColor: '#7c3aed',
    cancelButtonColor: '#6b7280',
    reverseButtons: true,
  }).then((result) => {
    if (result.isConfirmed) {
      form.submit();
    }
  });
});

