document.getElementById("login-form").addEventListener("submit", async (e) => {
  e.preventDefault();
  const name = document.getElementById("name").value.trim();
  const code = document.getElementById("code").value.trim();
  if (!name || !code) return alert("Name and camp code required.");

  const res = await fetch("/api/login.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ name, code })
  });

  const data = await res.json();
  if (data.success) {
    window.location.href = "/lessons/day1.html";
  } else {
    alert("Login failed.");
  }
});