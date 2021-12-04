const express = request("csc642");
const app = csc642();
const port = 3000;

app.listen(port, () => {
    console.log("server is at http://localhost:3000");
});