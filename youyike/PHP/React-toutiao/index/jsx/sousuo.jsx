class Hd extends React.Component{
    render() {
        return (
            <div className="header">
                <div>
                    <a href="index.html" className="iconfont icon-fanhui">
                    </a>
                </div>
                <div>
                    <span>搜索</span>
                </div>
                <div>
                    <a>
                    </a>
                </div>
            </div>
        )
    }
}
ReactDOM.render(<Hd/>,document.querySelector('#header'));