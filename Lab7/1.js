$(() => {
let btn = document.querySelector('.btn');

$("#saveBtn").click(() => {
  let task = {
    name: $('#nameInput').val(),
    description: $('#descriptionInput').val(),
    deadline : {
      date: $("#dateInput").val(),
      time: $("#timeInput").val(),
    },
  };
  $(".cntnt").load("container.html");
  $(".title").val("EU");

});
});
