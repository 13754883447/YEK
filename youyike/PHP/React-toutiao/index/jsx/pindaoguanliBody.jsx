class Del extends React.Component{
    // constructor(){
    //     super();
    //     this.state={
    //         lanmu:[]
    //     }
    // }
    //
    // componentDidMount(){
    //     this.setState({
    //         lanmu: [
    //             {id: 1, name: '推荐', url: '#/'},
    //             {id: 2, name: '视频', url: '#/'},
    //             {id: 3, name: '动漫', url: '#/'},
    //             {id: 4, name: '社会', url: '#/'},
    //             {id: 5, name: '娱乐', url: '#/'},
    //             {id: 6, name: '军事', url: '#/'},
    //             {id: 7, name: '科技', url: '#/'},
    //             {id: 8, name: '汽车', url: '#/'},
    //             {id: 9, name: '体育', url: '#/'},
    //             {id: 10, name: '财经', url: '#/'},
    //             {id: 11, name: '国际', url: '#/'},
    //             {id: 12, name: '时尚', url: '#/'},
    //             {id: 13, name: '游戏', url: '#/'},
    //             {id: 14, name: '美食', url: '#/'},
    //             {id: 15, name: '美文', url: '#/'},
    //             {id: 16, name: '故事', url: '#/'},
    //             {id: 17, name: '旅游', url: '#/'},
    //             {id: 18, name: '养生', url: '#/'}
    //         ]
    //     })
    // }
    render() {
        let {lanmu}=this.props;
        // let lanmu=this.state.lanmu;
        let lis=lanmu.map(v=>(
            <li key={v.id}>
                <a href="javascript:;">
                    {v.name}
                </a>
            </li>
        ));
        return (
            <div className="Control">
                <span className="Control-title">点击删除以下频道</span>
                <ul className="controlDetail">
                    {lis}
                </ul>
            </div>
        )
    }
}
class Add extends React.Component{
    render(){
        let {ADD}=this.props;
        // let lanmu=this.state.lanmu;
        let lis=ADD.map(v=>(
            <li key={v.id}>
                <a href="javascript:;">
                    {v.name}
                </a>
            </li>
        ));
        return (
            <div className="Control">
                <span className="Control-title">点击添加以下频道</span>
                <ul className="controlDetail">
                    {lis}
                </ul>
            </div>
        );
    }
}
class Bd extends React.Component{
    constructor(){
        super();
        this.state={
            lanmu:[],
            ADD:[]
        }
    }

    componentDidMount(){
        this.setState({
            lanmu: [
                {id: 1, name: '推荐', url: '#/'},
                {id: 2, name: '视频', url: '#/'},
                {id: 3, name: '动漫', url: '#/'},
                {id: 4, name: '社会', url: '#/'},
                {id: 5, name: '娱乐', url: '#/'},
                {id: 6, name: '军事', url: '#/'},
                {id: 7, name: '科技', url: '#/'},
                {id: 8, name: '汽车', url: '#/'},
                {id: 9, name: '体育', url: '#/'},
                {id: 10, name: '财经', url: '#/'},
                {id: 11, name: '国际', url: '#/'},
                {id: 12, name: '时尚', url: '#/'},
                {id: 13, name: '游戏', url: '#/'},
                {id: 14, name: '美食', url: '#/'},
                {id: 15, name: '美文', url: '#/'},
                {id: 16, name: '故事', url: '#/'},
                {id: 17, name: '旅游', url: '#/'},
                {id: 18, name: '养生', url: '#/'}
            ],
            ADD:[
                {id: 1, name: '推荐', url: '#/'},
                {id: 2, name: '视频', url: '#/'},
                {id: 3, name: '动漫', url: '#/'},
                {id: 4, name: '社会', url: '#/'},
                {id: 5, name: '娱乐', url: '#/'},
                {id: 6, name: '军事', url: '#/'},
                {id: 7, name: '科技', url: '#/'},
                {id: 8, name: '汽车', url: '#/'}
            ]
        })
    }

    render() {
        return (
            <div className="GL-box">
                <Del lanmu={this.state.lanmu}/>
                <Add ADD={this.state.ADD}/>
            </div>
        )
    }
}
ReactDOM.render(<Bd/>,document.querySelector('#GuanliBody'));