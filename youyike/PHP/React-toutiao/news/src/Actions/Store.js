let id=0;
export const addTODO=(text)=>{
    return{
        type:"ADD_TODO",
        id:id,
        text
    }
};