function openModal(modalId) {
    $(`#${modalId}`).removeClass('hidden');
  }


  function closeModal(modalId) {
    $(`#${modalId}`).addClass('hidden');
  }


  $('.open-modal').on('click', function() {
    const modalId = $(this).data('modal-id');
    openModal(modalId);
  });

  $('[id^="closeModalButton"]').on('click', function() {
    const modalId = $(this).closest('[id^="modal"]').attr('id');
    closeModal(modalId);
  });


  $('[id^="closeModal"]').on('click', function() {
    const modalId = $(this).closest('[id^="modal"]').attr('id');
    closeModal(modalId);
  });



  





  function showModal() {
    $('#myModal').removeClass('hidden');
  }

  function hideModal() {
    $('#myModal').addClass('hidden');
  }


  $('#openModalButton').on('click', function() {
    showModal();
  });


  $('#closeModalButton').on('click', function() {
    hideModal();
  });


  $('#addToListButton').on('click', function() {
    hideModal();
  });


  $('#myModal').on('click', function(event) {
    if (event.target === $('#myModal')[0]) {
      hideModal();
    }
  });

  $('.modal-content').on('click', function(event) {
    event.stopPropagation();
  });













 


  