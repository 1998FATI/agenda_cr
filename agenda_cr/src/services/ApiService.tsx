import axios from 'axios';

const URL ='http://172.23.18.140:8000/api/mobile/reunions';
export  const  ApiService = async ()=>{
     try {
      const response = await axios.get(`${URL}`);
      return response.data;
     }
     catch(error){
          console.error('حدث خطأ أثناء تحميل المواعيد ',error);
          throw error;
     }
};
export default ApiService;