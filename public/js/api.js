document.getElementById("pay-button").onclick = function () {
    // SnapToken acquired from previous step
    snap.pay("{{$transaction->snap_token}}", {
        // Optional
        onSuccess: function (result) {
            /* You may add your own js here, this is just example */ document.getElementById(
                "result-json"
            ).innerHTML += JSON.stringify(result, null, 2);
        },
        // Optional
        onPending: function (result) {
            /* You may add your own js here, this is just example */ document.getElementById(
                "result-json"
            ).innerHTML += JSON.stringify(result, null, 2);
        },
        // Optional
        onError: function (result) {
            /* You may add your own js here, this is just example */ document.getElementById(
                "result-json"
            ).innerHTML += JSON.stringify(result, null, 2);
        },
    });
};
