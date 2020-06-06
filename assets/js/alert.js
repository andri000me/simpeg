function alertError(message){
	$.notify(message, {
        className:'error',
        clickToHide: true,
        autoHide: true,
    });	
}

function alertSuccess(message){
	$.notify(message, {
        className:'success',
        clickToHide: true,
        autoHide: true,
    });	
}

function alertInfo(message){
	$.notify(message, {
        className:'info',
        clickToHide: true,
        autoHide: true,
    });	
}

function alertWarning(message){
	$.notify(message, {
        className:'warn',
        clickToHide: true,
        autoHide: true,
        globalPosition: 'top right',
    });	
}


