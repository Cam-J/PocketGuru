<?php
include("./header.php");
?>

<div id="main">
	<h4  id="policy_notice_title">Privacy Policy Notice</h4>
	
	<p id="policy_notice">The policy:<br />
	This privacy policy notice is served by 
	'The eCommerce Webstore' under the website; 
	<a href="http://localhost/multi-responsive">http://localhost/multi-responsive</a>. 
	The purpose of this policy is to explain to you how we control, process, 
	handle and protect your personal 
	information through the business and while you browse or use this website. 
	If you do not agree to the following policy you may wish to cease viewing / using this website, 
	and or refrain from submitting your personal data to us.</p>
	
	<h4 id="policy_key_title">Policy key definitions:</h4>
	<ul id="policy_key_list">
	        <li>"I", "our", "us", or "we" refer to the business, [the Local Theatre Company].</li>
	        <li>"you", "the user" refer to the person(s) using this website.</li>
	        <li>GDPR means General Data Protection Act.</li>
	</ul>

    <script>
        // New div element
        let keyList = document.getElementById("policy_key_list");
        // Create the new list nodes the text will fill
        let listNode1 = document.createElement("li");
        let listNode2 = document.createElement("li");
        let listNode3 = document.createElement("li");
        // Create the text nodes to occupy the list nodes
        listNode1.textContent = "PECR means Privacy & Electronic Communications Regulation.";
        listNode2.textContent = "ICO means Information Commissioner's Office.";
        listNode3.textContent = "Cookies mean small files stored on a users computer or device.";
        // append the new elements to the list.
        keyList.appendChild(listNode1);
        keyList.appendChild(listNode2);
        keyList.appendChild(listNode3);
    </script>
	
	<h4 id="key_principle_title">Key principles of GDPR:</h4>
	<p id="key_principles">Our privacy policy embodies the following key principles; (a) Lawfulness, fairness and transparency, 
	(b) Purpose limitation, (c) Data minimisation, (d) Accuracy, (e) Storage limitation, 
	(f) Integrity and confidence, (g) Accountability.</p>
	
	<h4 id="processing_title">Processing of your personal data</h4>
	<p id="processing">Under the GDPR (General Data Protection Regulation) we control and / or process any personal information about you electronically using the following lawful bases.</p>
	<ul id="processing_list">
	        <li>We are registered with the ICO under the Data Protection Register, our registration number is: 123456.</li>
	</ul>
	
	<p>If, as determined by us, the lawful basis upon which we process your personal information changes, we will notify you 
	about the change and any new lawful basis to be used if required. We shall stop processing your personal information 
	if the lawful basis used is no longer relevant.</p>
	
	<h4 id="individual_rights_title">Your individual rights</h4>
	
	<p>Under the GDPR your rights are as follows. You can read more about your rights in details here;</p>
	<ul id="individual_rights_list">
	
	        <li>the right to rectification;</li>
	        <li>the right to erasure;</li>
	        <li>the right to restrict processing;</li>
	
	</ul>

    <script>
        // Create new div element
        let rightList = document.getElementById("individual_rights_list");
        // Create new list nodes
        let List1 = document.createElement("li");
        let List2 = document.createElement("li");
        let List3 = document.createElement("li");
        let List4 = document.createElement("li");
        let List5 = document.createElement("li");
        // Add text to the list nodes
        List1.textContent = "the right to be informed;";
        List2.textContent = "the right of access;";
        List3.textContent = "the right to data portability;";
        List4.textContent = "the right to object; and";
        List5.textContent = "the right not to be subject to automated decision-making including profiling.";
        // Ref parent element
        list = document.getElementById("individual_rights_list");
        // Append elements
        // Place the new nodes before the starting point of the list.
        list.insertBefore(List2, list.children[0]);
        list.insertBefore(List1, list.children[0]);

        // Add the rest of the bullet points in after the list
        list.appendChild(List3);
        list.appendChild(List4);
        list.appendChild(List5);

    </script>
	        
	<p>You also have the right to complain to the ICO [<a href="www.ico.org.uk">www.ico.org.uk</a>] if you feel there is a problem with the way we are handling your data.</p>
	
	<p>We handle subject access requests in accordance with the GDPR.</p>
	
	<h4>Internet cookies</h4>
	<p>We use cookies on this website to provide you with a better user experience. We do this by placing a small text file on your device / computer hard drive to track how you use the website, to record or log whether you have seen particular messages that we display, to keep you logged into the website where applicable, to display relevant adverts or content, referred you to a third party website.</p>
	
	<p>Some cookies are required to enjoy and use the full functionality of this website.</p>
	
	<p>We use a cookie control system which allows you to accept the use of cookies, and control which cookies are saved to your device / computer. Some cookies will be saved for specific time periods, where others may last indefinitely. Your web browser should provide you with the controls to manage and delete cookies from your device, please see your web browser options.</p>
	
	<h4>Cookies that we use are;</h4>
	<ul id="cookie_policy">
	        <li>You are not logged in so no cookies are in use at this time.</li>
	</ul>
	
	<h4>Data security and protection</h4>
	<p>We ensure the security of any personal information we hold by using secure data storage technologies and precise procedures in how we store, access and manage that information. Our methods meet the GDPR compliance requirement.</p>
	
	</div>
    <script>
        // Declare the div element (i used ID)
        let cookiePolicy = document.getElementById("cookie_policy");
        // Declare the li node we want to replace
        let oldPara = document.querySelector("li");
        // declare the new li node
        let newPara = document.querySelector("li");
        // declare text node
        newPara.textContent = "User - login control";
        // replace oldPara with newPara.
        cookiePolicy.replaceWith(newPara, oldPara);
    </script>

<?php
include("./footer.php");