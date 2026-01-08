function validateCandidateForm() {
    let name = document.getElementById("candidate_name").value;
    let party = document.getElementById("candidate_party").value;
    if (name === "" || party === "") {
        alert("Please fill in all candidate fields.");
        return false;
    }
    return true;
}

function validateVoterForm() {
    let name = document.getElementById("voter_name").value;
    let email = document.getElementById("voter_email").value;
    if (name === "" || email === "") {
        alert("Please fill in all voter fields.");
        return false;
    }
    return true;
}
