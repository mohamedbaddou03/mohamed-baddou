const form = document.getElementById("form");
const input = document.getElementById("nouvelle");
const list = document.getElementById("list");

form.addEventListener("submit", function (e) {
  e.preventDefault();
  const taskText = input.value.trim();

  if (taskText !== "") {
    addTask(taskText);
    input.value = "";
  }
});

function addTask(text) {
  const li = document.createElement("li");
  const span = document.createElement("span");
  span.textContent = text;
  const actions = document.createElement("div");
  actions.className = "actions";

  const completeBtn = document.createElement("button");
  completeBtn.textContent = "Terminée";
  completeBtn.style.backgroundColor = "green";
  completeBtn.addEventListener("click", () => {
  span.classList.toggle("terminer");
  });

  const deleteBtn = document.createElement("button");
  deleteBtn.textContent = "Supprimer";
  deleteBtn.style.backgroundColor = "red";
  deleteBtn.addEventListener("click", () => {
    li.remove(); 
  });

  actions.appendChild(completeBtn);
  actions.appendChild(deleteBtn);

  li.appendChild(span);
  li.appendChild(actions);
  list.appendChild(li);
}
