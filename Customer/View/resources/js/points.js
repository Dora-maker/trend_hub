function openPointHistory() {
    document.getElementById("pointHistoryModal").classList.remove("hidden");
}

function closePointHistory() {
    document.getElementById("pointHistoryModal").classList.add("hidden");
}

function claimReward() {
    document.getElementById("claimRewardModal").classList.remove("hidden");
}

function cancelRewardClaim() {
    document.getElementById("claimRewardModal").classList.add("hidden");
}

function rewardClaimed() {
    document.getElementById("claimRewardModal").classList.add("hidden");
    document.getElementById("rewardClaimedModal").classList.remove("hidden");
}

function closeRewardClaimed() {
    document.getElementById("rewardClaimedModal").classList.add("hidden");
}