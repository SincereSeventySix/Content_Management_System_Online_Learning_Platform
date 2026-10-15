import React, { useEffect, useState } from "https://esm.sh/react@18.3.1";
import { createRoot } from "https://esm.sh/react-dom@18.3.1/client";
import htm from "https://esm.sh/htm@3.1.1";

const html = htm.bind(React.createElement);

function App() {
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const [student, setStudent] = useState("");
  const [lessons, setLessons] = useState([]);
  const [error, setError] = useState("");

  async function loadLessons() {
    const response = await fetch("../api/lessons.php", { credentials: "same-origin" });
    if (response.status === 401) {
      setStudent("");
      return;
    }
    const data = await response.json();
    setStudent(data.username || "");
    setLessons(data.lessons || []);
  }

  useEffect(() => {
    loadLessons();
  }, []);

  async function onLogin(event) {
    event.preventDefault();
    setError("");
    const response = await fetch("../api/login.php", {
      method: "POST",
      credentials: "same-origin",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ username, password }),
    });
    const data = await response.json();
    if (!response.ok) {
      setError(data.error || "Login failed.");
      return;
    }
    setPassword("");
    await loadLessons();
  }

  async function onLogout() {
    await fetch("../api/logout.php", { method: "POST", credentials: "same-origin" });
    setStudent("");
    setLessons([]);
  }

  if (!student) {
    return html`
      <main class="app">
        <section class="card">
          <h1>Otutor</h1>
          <p>Log in to see the lesson list.</p>
          <form onSubmit=${onLogin}>
            <label>Username
              <input value=${username} onInput=${(event) => setUsername(event.target.value)} />
            </label>
            <label>Password
              <input type="password" value=${password} onInput=${(event) => setPassword(event.target.value)} />
            </label>
            ${error ? html`<p class="error">${error}</p>` : null}
            <button type="submit">Log in</button>
          </form>
          <a class="back" href="../fibon_form.php">Create an account</a>
        </section>
      </main>
    `;
  }

  return html`
    <main class="app">
      <section class="card">
        <h1>${student}'s lessons</h1>
        <ol>
          ${lessons.map((lesson) => html`
            <li key=${lesson.id} class=${lesson.current ? "current" : ""}>
              ${lesson.name}${lesson.done ? " (done)" : ""}
            </li>
          `)}
        </ol>
        <button type="button" onClick=${onLogout}>Log out</button>
        <a class="back" href="../fibon_fibon.php">Open the classic lesson page</a>
      </section>
    </main>
  `;
}

createRoot(document.getElementById("root")).render(html`<${App} />`);
