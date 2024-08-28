import removeSessionMessage from './custom/removeSessionMessage';
import removeLead from './custom/removeLead';
import changeLeadStatus from './custom/changeLeadStatus';
import changeButtonState from './custom/changeButtonState';

export const CONFIG = {

    '/lead/create': [
        removeSessionMessage,
        changeButtonState,
    ],

    '/lead/edit': [
        removeSessionMessage,
        changeButtonState,
    ],

    '/lists-and-statistics': [
        removeLead,
        changeLeadStatus
    ],
}
