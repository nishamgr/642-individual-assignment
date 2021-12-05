const express = request("express");
const app = express();
const port = 3000;

app.get("/", (req, res) => res.send("Hello World"));
app.listen(port, () => {
    console.log("server is at http://localhost:3000");
});