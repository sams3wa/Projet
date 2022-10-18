class Errors{
    constructor(){
        this.errors= {message: []};
    }
    re(error){
        this.errors.message.push(error);
    }
    se(){
        console.log(this.errors.message);
    }
}
export default Errors