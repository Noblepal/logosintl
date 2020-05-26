<!-- Modals -->

<!-- Edit teacher modal -->
<div class="modal fade" id="editTeacher" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Edit Teacher</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="" method="post">
            <div class="row">
              <div class="form-group col-md-6">
                <label>Name of teacher</label>
                <input type="text" name="teacher_name" id="teacher_name" class="form-control" placeholder="Teacher's name" required>
              </div>
              <div class="form-group col-md-6">
                <label>Phone</label>
                <input type="tel" name="teacher_phone" id="teacher_phone" class="form-control" placeholder="Example 254700123456" pattern="[0-9]{3}[0-9]{3}[0-9]{6}" required>
            </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label>Age</label>
                <input type="number" name="teacher_age" id="teacher_age" class="form-control" placeholder="Enter age" required>
              </div>

              <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" name="teacher_email"  id="teacher_email" class="form-control" placeholder="Enter email address" required>
              </div>
            </div>
          <input type="hidden" name="teacher_id" id="teacher_id" value="">
        </div>
        <div class="modal-footer">
          <button type="submit" name="updateTeacher" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete teacher modal -->
<div class="modal fade" id="deleteTeacherModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Remove Teacher</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="teacher_id" id="teacher_id_delete" value="">
          <p>Are you sure you want to remove <span id="tname"></span>?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" name="deleteTeacher" class="btn btn-danger">Remove</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit student modal -->
<div class="modal fade" id="editStudent" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Edit Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="" method="post">
            <div class="row">
              <div class="form-group col-md-6">
                <label>Name of Student</label>
                <input type="text" name="student_name" id="student_name" class="form-control" placeholder="Student's name" required>
              </div>
              <div class="form-group col-md-6">
                <label>Phone</label>
                <input type="tel" name="student_phone" id="student_phone" class="form-control" placeholder="Example 254700123456" pattern="[0-9]{3}[0-9]{3}[0-9]{6}" required>
            </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label>Email</label>
                <input type="email" name="student_email"  id="student_email" class="form-control" placeholder="Enter email address" required>
              </div>
            </div>
          <input type="hidden" name="student_id" id="student_id" value="">
        </div>
        <div class="modal-footer">
          <button type="submit" name="updateStudent" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete student modal -->
<div class="modal fade" id="deleteStudentModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Remove Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="student_id" id="student_id_delete" value="">
          <p>Are you sure you want to remove <span id="sname"></span>?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" name="deleteStudent" class="btn btn-danger">Remove</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Edit course modal -->
<div class="modal fade" id="editCourseModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="" method="post">
            <div class="row">
              <div class="form-group col-md-6">
                <label>Name of course</label>
                <input type="text" name="title" id="course_name" class="form-control" placeholder="Topic Title" required>
              </div>
              <div class="form-group col-md-6">
                <label>Education Level</label>
                <select class="form-control" name="course_type" required>
                  <option value="" selected disabled>Select level</option>
                  <option value="diploma">Diploma</option>
                  <option value="bachelors">Bachelors</option>
                  <option value="masters">Masters</option>
                  <option value="doctorate">Doctorate</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label>Course Duration (Weeks)</label>
                <input type="number" name="course_duration" id="course_duration" class="form-control" placeholder="Enter length of course" required>
              </div>

              <div class="form-group col-md-6">
                <label>Number of topics</label>
                <input type="number" name="course_num_topics" id="course_num_topics" class="form-control" placeholder="Enter number of topics" required>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label>Course Description</label>
                <textarea name="course_description" id="course_description" class="form-control" placeholder="Enter course description" required></textarea>
              </div>
              <div class="form-group col-md-6">
                <label>Teacher</label>
                <select class="form-control" name="teacher" required>
                  <option value="" selected disabled>Select teacher</option>
                  <?php $teachers = getTeachers();
                  foreach ($teachers as $teacher){
                    ?>
                      <option value="<?php echo $teacher['name'];?>"><?php echo $teacher['name'];?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>

            </div>

            <div class="form-check my-3">
              <input type="checkbox" name="popular" value="yes" class="form-check-input" id="exampleCheck1">
              <label class="ml-2 form-check-label" for="exampleCheck1">Add to popular courses? <small>(will be displayed on the home page)</small></label>
              <input type="hidden" name="course_id" id="course_id_update" value="">
            </div>
        <div class="modal-footer">
          <button type="submit" name="updateCourse" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>


<!-- Delete course modal -->
<div class="modal fade" id="deleteCourseModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Remove Course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="course_id" id="course_id_delete" value="">
          <p>Are you sure you want to remove <span id="cname"></span>?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" name="deleteCourse" class="btn btn-danger">Remove</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit topic modal -->
<div class="modal fade" id="editTopicModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Topic</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Topic Title</label>
                  <input type="text" id="topic_name" name="topic_name" class="form-control" placeholder="Topic Title">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" required>
                    <option value="" selected disabled>Select Status</option>
                    <option value="published">Published</option>
                    <option value="draft">Draft</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="topic_content">Topic Content</label>
                  <textarea name="topic_content" id="topic_content_update" rows="8" cols="60"></textarea>
                </div>
              </div>
              <input type="hidden" name="topic_id" id="topic_id_update" value="">
            </div>
        <div class="modal-footer">
          <button type="submit" name="updateTopic" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- Delete topic modal -->
<div class="modal fade" id="deleteTopicModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Remove Course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="topic_id" id="topic_id_delete" value="">
          <p>Are you sure you want to remove <span id="tp_name"></span>?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" name="deleteTopic" class="btn btn-danger">Remove</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>
