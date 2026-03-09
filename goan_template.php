<?php

 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jay Janardan Creations</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; margin: 0; display: flex; flex-direction: column; height: 100vh; background-color: #f9f9f9; }
        header { border-bottom: 3px solid #b22222; padding: 15px; display: flex; justify-content: space-between; align-items: center; background: white; }
        
        .main-container { display: flex; flex: 1; overflow: hidden; }
        
        .sidebar { width: 220px; border-right: 1px solid #ddd; padding: 15px; overflow-y: auto; font-size: 14px; background: #fff; }
        .sidebar a, footer a { text-decoration: none; color: #b22222; display: block; margin: 8px 0; transition: 0.3s; }
        .sidebar a:hover, footer a:hover { color: #000; text-decoration: underline; }

        .content-box { flex: 1; border: none; margin: 10px; background: white; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        iframe { width: 100%; height: 100%; border: none; }

        footer { border-top: 2px solid #b22222; padding: 12px; display: flex; justify-content: space-around; background: #eee; font-weight: bold; }
        .clickable { color: #b22222; text-decoration: underline; cursor: pointer; }
        ul { list-style: none; padding: 0; }
        li { margin-bottom: 8px; cursor: pointer; }
        
        hr { border: 0; border-top: 1px solid #eee; margin: 15px 0; }
        .search-box { width: 90%; padding: 5px; border: 1px solid #ccc; border-radius: 4px; }
        .search-btn { margin-top: 5px; width: 95%; cursor: pointer; background: #b22222; color: white; border: none; padding: 5px; border-radius: 4px; }
    </style>
</head>
<body>

    <header>
        <div class="logo"><img src="Logo_JJC1.jpg" alt="JJC Logo" height="80" width="80"></div>
        <h1 style="color: #b22222; margin: 0;">Jay Janardan Creations</h1>
        <div style="font-weight: bold;">Home Page</div>
    </header>

   <div class="main-container">
      <div class="sidebar">
           
            <ul id="sidebar-links">
                <li><strong>Taluka name</strong></li>
                <input type="text" id="taluka-search" class="search-box" placeholder="Alibag, Pen, Uran, Panvel only...">
                <li><strong>Goan name</strong></li>
                <input type="text" id="village-search" class="search-box" placeholder="Type the village name">
                <button type="button" class="search-btn" onclick="searchTaluka()">Search Data/Info</button>
                <marquee>Select or type the village name belonging to the chosen Taluka </marquee>
                
        <hr>
           </ul>
</div>


        <div class="content-box">
            <iframe name="display-frame" id="display-frame" src="about:blank"></iframe>
        </div>

        <div class="sidebar" style="border-left: 1px solid #ddd; border-right: none;">
            <ul>
                <li style="color: #000;"><strong>Government Sites</strong></li>
                <hr>
                <li><a href="https://www.raigadpolice.gov.in/en" target="_blank">🚨 100 Police</a></li>
                <li><a href="https://mahafireservice.gov.in/" target="_blank">🔥 101 Fire</a></li>
                <li><a href="http://vbch.dnh.nic.in/content/emergency-medical-response-108-0" target="_blank">🚑 108 Medical</a></li>
                <li><a href="https://112.gov.in/" target="_blank">📞 112 Emergency</a></li>
                <hr>
                <li><a href="https://aaplesarkar.mahaonline.gov.in/en" target="_blank">Aaple Sarkar</a></li>
                <li><a href="https://www.pmindia.gov.in/en/" target="_blank">PMO (PM)</a></li>
                <li><a href="https://www.cmocouncil.org/advisory-board/india" target="_blank">CMO (CM)</a></li>
                      <li><a href="https://en.wikipedia.org/wiki/Indian_Army" target="_blank">Indian Soldier</a></li>
                <hr>
                <li style="color: #000;"><strong>International</strong></li>
                <li><a href="https://www.timeanddate.com/weather" target="_blank">Weather</a></li>
                <li><a href="https://history.state.gov/countries/all" target="_blank">Country name</a></li>
                <li><a href="https://www.google.com/maps" target="_blank">World info</a></li>
            </ul>
        </div>
    </div>

    <footer>
        <a href="home_inner.html" target="display-frame">Home Page</a>
        <a href="taluka.html" target="display-frame">Taluka List</a>
        <span class="clickable" onclick="loadNature()">Nature</span>
        <a href="health.html" target="display-frame">Health</a>
        <a href="jobs.html" target="display-frame">Jobs</a>
        <span class="clickable" onclick="loadJayShivRay()">Jay ShivRay History</span>
    </footer>

 <script>

    // NEW SEARCH FUNCTION
    function searchTaluka() {
        // दोन्ही इनपुट मधून व्हॅल्यू घेणे
        const talukaVal = document.getElementById('taluka-search').value.toLowerCase().trim();
        const villageVal = document.getElementById('village-search').value.trim();
        const frame = document.getElementById('display-frame');

        if (talukaVal === "" && villageVal === "") {
            alert("कृपया तालुका किंवा गावाचे नाव टाईप करा.");
            return; 
        }

       // fetch_data.php ला दोन्ही व्हॅल्यू पाठवून रिझल्ट iframe मध्ये दाखवणे
        frame.src = "fetch_data1.php?taluka=" + encodeURIComponent(talukaVal) + "&village=" + encodeURIComponent(villageVal);

        // २. सिडेबार मध्ये टॅब बदलणे (हे नवीन फंक्शन कॉल करा)
    loadVillageTabs(talukaVal, villageVal);
    } 

 // नवीन फंक्शन: सर्च केल्यानंतर सिडेबार बदलण्यासाठी
function loadVillageTabs(taluka, village) {
    const sidebarList = document.getElementById('sidebar-links');
    
    // सिडेबारमध्ये नवीन टॅब्स तयार करणे
    sidebarList.innerHTML = `
        <li style="color: #b22222; font-weight: bold; font-size: 16px;">गाव: ${village}</li>
        <hr>
        <li style="font-weight: bold;"><a href="fetch_data1.php?taluka=${taluka}&village=${village}&section=info" target="display-frame">📄 Infromation(सर्व माहिती)</a></li>
        <li style="font-weight: bold;"><a href="fetch_data1.php?taluka=${taluka}&village=${village}&section=doctor" target="display-frame">🩺 Doctors(डॉक्टर्स)</a></li>
        <li style="font-weight: bold;"><a href="fetch_data1.php?taluka=${taluka}&village=${village}&section=teachers" target="display-frame">👨‍🏫 Teachers(शिक्षक)</a></li>
        <li style="font-weight: bold;"><a href="fetch_data1.php?taluka=${taluka}&village=${village}&section=police" target="display-frame">👮 Police(पोलीस)</a></li>
        <li style="font-weight: bold;"><a href="fetch_data1.php?taluka=${taluka}&village=${village}&section=Soldier" target="display-frame">🎖️ Soliders(सैनिक)</a></li>
        <li style="font-weight: bold;"><a href="fetch_data1.php?taluka=${taluka}&village=${village}&section=social_worker" target="display-frame">🤝 Social_workers(सामाजिक कार्यकर्ते)</a></li>
        <li style="font-weight: bold;"><a href="fetch_data1.php?taluka=${taluka}&village=${village}&section=cas" target="display-frame">👮 CA's</a></li>
        <li style="font-weight: bold;"><a href="fetch_data1.php?taluka=${taluka}&village=${village}&section=engineers" target="display-frame">👮 Engineers</a></li>
        <li style="font-weight: bold;"><a href="fetch_data1.php?taluka=${taluka}&village=${village}&section=carpenters" target="display-frame">👮 Carpenters</a></li>
        <hr>
        <li><button onclick="window.location.reload()" style="margin-top:10px; cursor:pointer; padding: 5px; width:100%;">Back to main</button></li>
    `;
}
    

    function loadJayShivRay() {
        const sidebarList = document.getElementById('sidebar-links');
        sidebarList.innerHTML = `
            <li style="font-weight: bold;"><a href="Jayshivray.php" target="display-frame">माहिती</a></li>
            <li style="font-weight: bold;"><a href="startinfo.php" target="display-frame">प्रारंभिक जीवन</a></li>
            <li style="font-weight: bold;"><a href="Ladhai1.php" target="display-frame">विजापूर सल्तनतीशी संघर्ष</a></li>
            <li style="font-weight: bold;"><a href="Ladhai.php" target="display-frame">मुघल साम्राज्याशी संघर्ष</a></li>
            <li style="font-weight: bold;"><a href="vijay.php" target="display-frame">पुनर्विजय</a></li> 
            <li style="font-weight: bold;"><a href="abhishekinfo.php" target="display-frame">राज्याभिषेक</a></li>        
            <li style="font-weight: bold;"><a href="karbharinfo.php" target="display-frame">राज्यकारभार</a></li>
            <li style="font-weight: bold;"><a href="familyinfo.php" target="display-frame">छत्रपती शिवाजी राजांचे कुटुंब</a></li>
            <li style="font-weight: bold;"><a href="deathinfo.php" target="display-frame">मृत्यू आणि उत्तराधिकार</a></li>
            <li style="font-weight: bold;"><a href="jayanti.php" target="display-frame">जयंती</a></li>
            <li><button onclick="window.location.reload()" style="margin-top:10px; cursor:pointer; padding: 5px;">Back to Main</button></li>
        `;
    }

     function loadNature() {
        const sidebarList = document.getElementById('sidebar-links');
        sidebarList.innerHTML = `
            <li style="font-weight: bold;"><a href="Universe.php" target="display-frame">Universe</a></li>
            <li style="font-weight: bold;"><a href="Earth.php" target="display-frame">Earth</a></li>
             
            
            <li><button onclick="window.location.reload()" style="margin-top:10px; cursor:pointer; padding: 5px;">Back to Main</button></li>
        `;
}
</script>

</body>
</html>
