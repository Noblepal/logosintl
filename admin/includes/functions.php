<?php

session_start();

// MySQL connection
$con = mysqli_connect('localhost', 'favoure1_favoure1', '6Ktx$hw41L*k', 'favoure1_logosintl');
//$con = mysqli_connect('localhost', 'root', '', 'logosintl');

if (!isset($_SESSION['logged_in'])) {
?>
  <script>
    window.location.replace("login.php?logged_in=0&message=You must be logged in");
  </script>
  <?php
}

if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
  if (isset($_POST['createTopic'])) {
    createTopic($_POST, "published");
  } else if (isset($_POST['saveDraft'])) {
    createTopic($_POST, "draft");
  } else if (isset($_POST['createCourse'])) {
    createCourse($_POST);
  } else if (isset($_POST['createTeacher'])) {
    createTeacher($_POST);
  } else if (isset($_POST['deleteTeacher'])) {
    deleteTeacher($_POST);
  } else if (isset($_POST['updateTeacher'])) {
    updateTeacher($_POST);
  } else if (isset($_POST['updateCourse'])) {
    updateCourse($_POST);
  } else if (isset($_POST['deleteCourse'])) {
    deleteCourse($_POST);
  } else if (isset($_POST['deleteTopic'])) {
    deleteTopic($_POST);
  } else if (isset($_POST['createAdminUser'])) {
    createAdminUser($_POST);
  }
} else {
}

function createAdminUser($post)
{
  global $con;
  extract($post);

  if (isUserExists($adminEmail)) {
    header('location: addAdmin.php?success=0&message=Email address already exists');
  } else {
    $creator = $_SESSION['name'];
    $stmt = $con->prepare("INSERT INTO admin (username, email, password, created_at, created_by) VALUES (?,?,?, now(),?)");
    $adminPass = password_hash($adminPass, PASSWORD_DEFAULT);
    $stmt->bind_param("ssss", $adminName, $adminEmail, $adminPass, $creator);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->affected_rows > 0) {
      header('location: addAdmin.php?success=1&message=Admin created successfully');
    } else {
      header('location: addAdmin.php?success=0&message=' . $stmt->error);
    }
  }
}


function isUserExists($email)
{
  global $con;
  $stmt = $con->prepare("SELECT * FROM admin WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();
  if ($stmt->num_rows > 0) {
    $stmt->close();
    return true;
  } else {
    $stmt->close();
    return false;
  }
}

function getCourses()
{
  global $con;
  $stmt = $con->prepare("SELECT * FROM courses ORDER BY title ASC");
  $stmt->execute();
  $row = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  foreach ($row as $row1) {
  ?>
    <option value="<?php echo $row1['id']; ?>"><?php echo $row1['title']; ?></option>
  <?php
  }
}

function getTeachers()
{
  global $con;
  $stmt = $con->prepare("SELECT * FROM teachers ORDER BY name ASC");
  $stmt->execute();
  $row = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->free_result();
  $stmt->close();
  return $row;
}

function getTeachersForTableData()
{
  global $con;
  $stmt = $con->prepare("SELECT * FROM teachers ORDER BY created_at DESC");
  $stmt->execute();
  $row = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->free_result();
  $stmt->close();
  $counter = 1;
  foreach ($row as $teacher) {
  ?>
    <tr>
      <th scope="row"><?php echo $counter; ?></th>
      <td><img widht="80" height="80" src=".<?php echo $teacher['image_url']; ?>" /> </td>
      <td><?php echo $teacher['name']; ?></td>
      <td><?php echo $teacher['email']; ?></td>
      <td><?php echo $teacher['phone']; ?></td>
      <td>
        <button class="btn btn-primary" data-toggle="modal" data-target="#editTeacher" onclick="
        document.getElementById('teacher_name').value='<?php echo $teacher['name']; ?>';
        document.getElementById('teacher_id').value='<?php echo $teacher['id']; ?>';
        document.getElementById('teacher_email').value='<?php echo $teacher['email']; ?>';
        document.getElementById('teacher_age').value='<?php echo $teacher['age']; ?>';
        document.getElementById('teacher_phone').value='<?php echo $teacher['phone']; ?>';">Edit</button>
        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteTeacherModal" onclick="
        document.getElementById('tname').innerHTML='<?php echo $teacher['name']; ?>';
        document.getElementById('teacher_id_delete').value='<?php echo $teacher['id']; ?>';">Delete</button>
      </td>
    </tr>
  <?php
    $counter++;
  }
}

function getCoursesForTableData()
{
  global $con;
  $stmt = $con->prepare("SELECT * FROM courses ORDER BY created_at DESC");
  $stmt->execute();
  $row = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->free_result();
  $stmt->close();
  $counter = 1;
  foreach ($row as $course) {
  ?>
    <tr>
      <th scope="row"><?php echo $counter; ?></th>
      <td><?php echo $course['title']; ?></td>
      <td><?php echo $course['teacher']; ?></td>
      <td><?php echo $course['duration']; ?></td>
      <td><?php echo $course['topics_num']; ?></td>
      <td><?php echo $course['popular']; ?></td>
      <td>
        <button class="btn btn-primary" data-toggle="modal" data-target="#editCourseModal" onclick="
        document.getElementById('course_name').value='<?php echo $course['title']; ?>';
        document.getElementById('course_id_update').value='<?php echo $course['id']; ?>';
        document.getElementById('course_duration').value='<?php echo $course['duration']; ?>';
        document.getElementById('course_num_topics').value='<?php echo $course['topics_num']; ?>';
        document.getElementById('course_description').value='<?php echo $course['course_description']; ?>';
        document.getElementById('popular').value='<?php echo $course['popular']; ?>';">Edit</button>
        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteCourseModal" onclick="
        document.getElementById('cname').innerHTML='<?php echo $course['title']; ?>';
        document.getElementById('course_id_delete').value='<?php echo $course['id']; ?>';">Delete</button>
      </td>
    </tr>
  <?php
    $counter++;
  }
}


function getTopicsForTableData()
{
  global $con;
  $stmt = $con->prepare("SELECT * FROM topics ORDER BY created_at DESC");
  $stmt->execute();
  $row = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->free_result();
  $stmt->close();
  $counter = 1;
  foreach ($row as $topic) {
  ?>
    <tr>
      <th scope="row"><?php echo $counter; ?></th>
      <td><?php echo $topic['topic_name']; ?></td>
      <td><?php echo getTopicParentCourse($topic['course_id']); ?></td>
      <td><?php echo $topic['status']; ?></td>
      <td>
        <a class="btn btn-primary" href="updateTopic.php?topic_id=<?php echo $topic['id']; ?>">Edit</a>
        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteTopicModal" onclick="
        document.getElementById('tp_name').innerHTML='<?php echo $topic['topic_name']; ?>';
        document.getElementById('topic_id_delete').value='<?php echo $topic['id']; ?>';">Delete</button>
      </td>
    </tr>
<?php
    $counter++;
  }
}

function getTopicParentCourse($course_id)
{
  global $con;
  $stmt = $con->prepare("SELECT title FROM courses WHERE id = ?");
  $stmt->bind_param('s', $course_id);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($course_name);
  $stmt->fetch();
  $stmt->free_result();
  $stmt->close();
  return $course_name;
}

function getTopicForEditing($topic_id)
{
  global $con;
  $stmt = $con->prepare("SELECT * FROM topics WHERE id = ?");
  $stmt->bind_param('s', $topic_id);
  $stmt->execute();
  $mtopic = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->free_result();
  $stmt->close();
  $_SESSION['topic'] = $mtopic;
  return $mtopic;
}

function getTopicName($topic_id)
{
  global $con;
  $stmt = $con->prepare("SELECT topic_name FROM topics WHERE id = ?");
  $stmt->bind_param('s', $topic_id);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($topic_name);
  $stmt->free_result();
  $stmt->close();
  $_SESSION['topic_name'] = $topic_name;
}


function createCourse($post)
{
  global $con;
  extract($post);
  $popular = $popular == "yes" ? $popular : "no";
  $stmt = $con->prepare("INSERT INTO courses (title, type, course_description, teacher, duration, topics_num, popular, created_at) VALUES (?,?,?,?,?,?,?, now())");
  $stmt->bind_param("sssssss", $title, $course_type, $course_description, $teacher, $course_duration, $course_num_topics, $popular);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->affected_rows > 0) {
    $stmt->free_result();
    $stmt->close();
    $stmt = $con->prepare("SELECT id FROM courses WHERE title = ?");
    $stmt->bind_param("s", $title);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($course_id);
    $stmt->fetch();
    header("location: addCourse.php?success=1&message=Course added successfully");
    //header("location: addCourse.php?success=1&message=Course added successfully");
  } else {
    header("location: addCourse.php?success=0&message=$stmt->error");
    //Failed to insert
  }

  $stmt->close();
}

function createTopic($post, $status)
{
  global $con;
  extract($post);
  $topic_icon = "_icon";
  $raw_content = strip_tags($topic_content);
  $stmt = $con->prepare("INSERT INTO topics (course_id, topic_name, topic_content, topic_content_html, topic_icon, status) VALUES(?,?,?,?,?,?)");
  $stmt->bind_param("isssss", $course_id, $topic_name, $raw_content, $topic_content, $topic_icon, $status);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->affected_rows > 0) {
    if ($status == "draft") {
      header("location: addTopic.php?success=1&message=Topic saved as draft");
    } else {
      header("location: addTopic.php?success=1&message=Topic added successfully");
    }
  } else {
    header("location: addTopic.php?success=0&message=$stmt->error");
    //echo "Failed to add topic " . $stmt->error;
  }

  $stmt->free_result();
  $stmt->close();
}

function createTeacher($post)
{
  global $con;
  extract($post);
  $image = $_FILES['image']['name'];
  $target = "../images/teachers/";
  $fileName = basename($image);
  $targetFilePath = $target . $fileName;
  $path_for_db = "./images/teachers/" . $fileName;

  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
  $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
  if (in_array($fileType, $allowTypes)) {

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {

      $stmt = $con->prepare("INSERT INTO teachers (name, phone, email, age, image_url) VALUES(?,?,?,?,?)");
      $stmt->bind_param("sssss", $teacher_name, $teacher_phone, $teacher_email, $teacher_age, $path_for_db);
      $stmt->execute();
      $stmt->store_result();


      if ($stmt->affected_rows > 0) {
        header("location: addTeacher.php?success=1&message=Teacher added successfully");
      } else {
        header("location: addTeacher.php?success=0&message=$stmt->error");
      }
    } else {
      echo "error";
      //header("location: addTeacher.php?success=0&message=Failed to upload image");
    }
  } else {
    header("location: addTeacher.php?success=0&message=File is not an image. Allowed types: 'jpg', 'png', 'jpeg', 'gif', 'pdf'");
  }
}


function deleteTeacher($post)
{
  global $con;
  extract($post);
  $stmt = $con->prepare("DELETE FROM teachers WHERE id = ?");
  $stmt->bind_param('s', $teacher_id);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->affected_rows > 0) {
    header("location: viewTeachers.php?delete=1&message=Id: " . $teacher_id . " teacher deleted successfully");
  } else {
    header("location: viewTeachers.php?delete=0&message=$stmt->error");
  }

  $stmt->free_result();
  $stmt->close();
}

function updateTeacher($post)
{
  global $con;
  extract($post);
  $stmt = $con->prepare("UPDATE teachers SET name = ?,phone = ?, email = ?, age = ? WHERE id = ?");
  $stmt->bind_param('sssss', $teacher_name, $teacher_phone, $teacher_email, $teacher_age, $teacher_id);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->affected_rows > 0) {
    header("location: viewTeachers.php?update=1&message=Id: " . $teacher_id . " teacher updated successfully");
  } else {
    header("location: viewTeachers.php?update=0&message=$stmt->error");
  }

  $stmt->free_result();
  $stmt->close();
}

function updateCourse($post)
{
  global $con;
  extract($post);
  $popular = $popular == "yes" ? $popular : "no";
  $stmt = $con->prepare("UPDATE courses SET title = ?, course_description = ?, type = ?, teacher = ?, duration = ?, topics_num = ?, popular = ? WHERE id = ?");
  $stmt->bind_param('ssssssss', $title, $course_description, $course_type, $teacher, $course_duration, $course_num_topics, $popular, $course_id);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->affected_rows > 0) {
    header("location: viewCourses.php?update=1&message=Id: " . $course_id . " course updated successfully");
  } else {
    header("location: viewCourses.php?update=0&message=$stmt->error");
  }

  $stmt->free_result();
  $stmt->close();
}

function deleteCourse($post)
{
  global $con;
  extract($post);
  $stmt = $con->prepare("DELETE FROM courses WHERE id = ?");
  $stmt->bind_param('s', $course_id);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->affected_rows > 0) {
    header("location: viewCourses.php?delete=1&message=Id: " . $course_id . " course deleted successfully");
  } else {
    header("location: viewCourses.php?delete=0&message=$stmt->error");
  }

  $stmt->free_result();
  $stmt->close();
}

function deleteTopic($post)
{
  global $con;
  extract($post);
  $stmt = $con->prepare("DELETE FROM topics WHERE id = ?");
  $stmt->bind_param('s', $topic_id);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->affected_rows > 0) {
    header("location: viewTopics.php?delete=1&message=Id: " . $course_id . " topic deleted successfully");
  } else {
    header("location: viewTopics.php?delete=0&message=$stmt->error");
  }

  $stmt->free_result();
  $stmt->close();
}

function countRecords($table_name)
{
  global $con;
  $stmt = $con->prepare("SELECT count(id) as count FROM $table_name");
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($count);
  $stmt->fetch();
  $stmt->free_result();
  $stmt->close();;
  return $count;
}









?>