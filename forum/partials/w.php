<li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                      Top  Categories
                    </a>
                    <ul class="dropdown-menu">';
                $sql=    "SELECT category_name FROM `categories`";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                  echo       '<a class="dropdown-item" href="#">'.$row['category_name'].'</a>';
                    
                    } 
                     
           echo         '</ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>';