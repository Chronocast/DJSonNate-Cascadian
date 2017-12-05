/**
    THIS PAGE NOW CONTAINS CODES FROM ADMIN THAT ARE TEMPORARALLY REMOVED
*/
<!-- DOCUMENT BUTTON START -->
<a class="showStep" target="{{ @i + 1 }}">
    <div class="dropdown">
        <!--<button type="button" class="btn btn-warning" alt="documents" data-toggle="modal" data-target="#documentModal">-->
        <button type="button" title="Documents" class="btn btn-warning dropdown-toggle" alt="Documents"  id="docDropdown{{ @track['track_id'] }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-file-text-o"></i> 
        </button>
        <div class="dropdown-menu" aria-labelledby="docDropdown{{ @track['track_id'] }}">
            
            <!-- DOCUMENT DROPDOWN -->
            <repeat group="{{ @docDisplay }}" value="{{ @doc }}">
                <check if="{{ @doc['track_id']==@track['track_id'] }}">
                    <true>
                        <!-- BUTTON TRIGGER FOR DOCUMENT MODAL -->
                        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#documentModal-{{ @doc['documentID'] }}">
                            {{ @doc['documentName'] }}
                        </button>
                        
                    </true>
                </check>
            </repeat>
            <!--END REPEAT: DROPDOWN-->
            
            <div class="dropdown-divider"></div>
            <button class="dropdown-item" type="button" data-toggle="modal" data-target="#uploadModal-{{ @track['track_id'] }}">
                Upload a new Document
            </button>
            
        </div>
    </div>
</a>
<!-- DOCUMENT BUTTON END -->
                        
<!-- Info MODAL -->
<div class="modal fade" id="infoModal-{{ @track['track_id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Project: {{ @track['project_name'] }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="card-text">Current Stage: {{ @track['current_stage'] }}</p>
                <p class="card-text">Start Date: {{ @track['start_date'] }}</p>
                <p class="card-text">End Date: {{ @track['end_date'] }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="edit" class="btn btn-warning">Edit</button>
                <a type="button" id="archive" class="btn btn-danger" href="./archive={{ @track['track_id'] }}" >Archive</a>
                <button type="button" id="save" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal -->

<!-- UPLOAD DOC MODAL -->
<div class="modal fade" id="uploadModal-{{ @track['track_id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form" enctype="multipart/form-data" role="form" action="./upload" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Project: {{ @track['project_name'] }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div id="dropBox">
                            <p>Select file to upload</p>
                        </div>
                        <input type="hidden" name="projectID" value="{{ @track['track_id'] }}">
                        <input type="file" name="fileInput" id="fileInput" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
                <input name="action" type="submit" value="Submit Image" class="btn">
            </form>
        </div>
    </div>
</div>
<!-- END Modal -->

<!-- DOCUMENT MODAL CODE repeat to display templated data -->
<repeat group="{{ @projectDisplay }}" value="{{ @track }}">
    <repeat group="{{ @docDisplay }}" value="{{ @doc }}">
        <check if="{{ @doc['track_id']==@track['track_id'] }}">
            <true>
                <div class="modal fade" id="documentModal-{{ @doc['documentID'] }}" tabindex="-1" role="dialog" aria-labelledby="documentModalLabel" aria-hidden="true" >
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="documentModalLabel">{{ @doc['documentName'] }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <iframe src="uploads/pdf/{{ @doc['documentName'] }}.pdf" width="640" height="480"></iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success">Download</button>
                                <button type="button" class="btn btn-danger">Archive</button>
                            </div>
                        </div>
                    </div>
                </div>
            </true>
        </check>
    </repeat>
</repeat>
